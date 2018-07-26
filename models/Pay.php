<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay".
 *
 * @property int $id
 * @property string $name
 *
 * @property Orders[] $orders
 */
class Pay extends \yii\db\ActiveRecord
{

    public static function getNameById($id){
        $typePay = Pay::find()->where(['id' => $id])->all();
        return $typePay[0]->name;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['type_pay' => 'id']);
    }
}
