<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 27.04.2018
 * Time: 14:49
 */

namespace app\models;
use yii\db\ActiveRecord;


class Site extends ActiveRecord
{
    public static function tableName()
    {
        return 'site';
    }
}