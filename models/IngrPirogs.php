<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 27.04.2018
 * Time: 14:49
 */

namespace app\models;
use yii\db\ActiveRecord;


class IngrPirogs extends ActiveRecord
{
    public static function tableName()
    {
        return 'pirog_ingr';
    }

    public function getProducts(){
        return $this->hasOne(Products::className(), ['pirog_id' => 'id']);
    }

    public function getIngredients(){
        return $this->hasOne(Ingredient::className(), ['ingr_id' => 'id']);
    }
}