<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_address".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 */
class AreaAddress extends \yii\db\ActiveRecord
{
    public static function getNameAreaById($id){
        $result = AreaAddress::find()->where(['id' => $id])->all();
        return $result[0]->name;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'price' => 'Price',
        ];
    }

    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['area_address' => 'id']);
    }
}
