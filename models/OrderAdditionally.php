<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_additionally".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $decor
 * @property string $inscription
 *
 * @property Orders $order
 * @property Products $product
 * @property Decor $decor0
 */
class OrderAdditionally extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_additionally';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['order_id', 'product_id', 'decor', 'inscription'], 'required'],
//            [['order_id', 'product_id', 'decor'], 'integer'],
            [['inscription'], 'string', 'max' => 50],
//            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
//            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
//            [['decor'], 'exist', 'skipOnError' => true, 'targetClass' => Decor::className(), 'targetAttribute' => ['decor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'decor' => 'Decor',
            'inscription' => 'Inscription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDecor0()
    {
        return $this->hasOne(Decor::className(), ['id' => 'decor']);
    }
}
