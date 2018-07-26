<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $create_date
 * @property string $update_date
 * @property int $count_product
 * @property double $sum
 * @property int $type_pay
 * @property int $status
 * @property string $phone
 * @property string $address
 * @property int $area_address
 * @property string $comment
 * @property int $preorder
 * @property string $order_comment
 * @property int $share
 *
 * @property OrderAdditionally[] $orderAdditionallies
 * @property OrderItem[] $orderItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'update_date', 'count_product', 'sum', 'type_pay', 'phone', 'address'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['count_product', 'type_pay', 'status', 'area_address', 'share'], 'integer'],
            [['sum'], 'number'],
            [['comment', 'order_comment'], 'string'],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 255],
            [['preorder'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ заказа',
            'create_date' => 'Дата создания',
            'update_date' => 'Дата готовности',
            'count_product' => 'Количество',
            'sum' => 'Сумма',
            'type_pay' => 'Тип оплаты',
            'status' => 'Статус',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'area_address' => 'Зона доставки',
            'comment' => 'Комментарий',
            'preorder' => 'Предзаказ',
            'order_comment' => 'Комменатрий оператора',
            'share' => 'Акция',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAdditionallies()
    {
        return $this->hasMany(OrderAdditionally::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

}
