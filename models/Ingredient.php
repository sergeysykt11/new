<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 27.04.2018
 * Time: 14:42
 */

namespace app\models;
use yii\db\ActiveRecord;


class Ingredient extends ActiveRecord
{
    public static function tableName()
    {
        return 'ingredient';
    }

    public function getProducts(){
        return $this->hasMany(Products::className(), ['id'=>'pirog_id'])
            ->viaTable('pirog_ingr', ['ingr_id'=>'id']);
    }
}