<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $create_date
 * @property string $update_date
 * @property int $count_product
 * @property double $sum
 * @property int $status
 * @property int $user
 * @property int $phone
 * @property int $address
 * @property string $comment
 * @property int $share
 * @property int $type_pay
 * @property int $preorder
 * @property string $order_comment
 *
 * @property OrderItem[] $orderItems
 * @property Pay $typePay
 * @property Share $share0
 */
class Orders extends \yii\db\ActiveRecord
{

    public $gift = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function getNameAreaById($id){
        $result = AreaAddress::find()->where(['id'=>$id])->asArray()->all();
        return $result[0]['name'];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date', 'update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_date'],
                ],
                // если вместо метки времени UNIX используется datetime:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'address', 'type_pay', 'preorder'], 'required'],
            [['create_date', 'update_date', 'order_comment'], 'safe'],
            [['count_product', 'area_address'], 'integer'],
            [['sum'], 'number'],
            [['comment', 'order_comment'], 'string'],
            [['preorder'], 'string', 'max' => 1],
            [['type_pay'], 'exist', 'skipOnError' => true, 'targetClass' => Pay::className(), 'targetAttribute' => ['type_pay' => 'id']],
            [['share'], 'exist', 'skipOnError' => true, 'targetClass' => Share::className(), 'targetAttribute' => ['share' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон для связи',
            'address' => 'Адрес доставки',
            'area_address' => 'Зона доставки',
            'comment' => 'Комментарий',
            'type_pay' => 'Тип оплаты',
            'preorder' => 'Предзаказ',
            'share' => 'Доступные акции',
            'gift' => ''
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function getAreaAddress(){
        return $this->hasOne(AreaAddress::className(), ['id' => 'area_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypePay()
    {
        return $this->hasOne(Pay::className(), ['id' => 'type_pay']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShare()
    {
        return $this->hasOne(Share::className(), ['id' => 'share']);
    }
}
