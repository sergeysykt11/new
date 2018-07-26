<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "share_product_in_cart".
 *
 * @property int $id
 * @property int $share_id
 * @property int $product_id
 *
 * @property Product $product
 * @property Share $share
 */
class ShareProductInCart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share_product_in_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'share_id', 'product_id'], 'required'],
            [['id', 'share_id', 'product_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['share_id'], 'exist', 'skipOnError' => true, 'targetClass' => Share::className(), 'targetAttribute' => ['share_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'share_id' => 'Share ID',
            'product_id' => 'Product ID',
        ];
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
    public function getLogicShare()
    {
        return $this->hasOne(LogicShare::className(), ['id' => 'share_id']);
    }
}
