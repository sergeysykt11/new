<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 13.05.2018
 * Time: 20:51
 */

namespace app\models;


use yii\db\ActiveRecord;

class Decor extends ActiveRecord
{
    public static function getNameById($id){
        $result = Decor::find()->where(['id'=>$id])->asArray()->all();
        return $result[0]['name'];
    }

    public static function tableName(){
        return 'decor';
    }
}