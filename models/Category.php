<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 26.04.2018
 * Time: 17:55
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(){
        return 'Category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}