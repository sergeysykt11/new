<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $left_img
 * @property string $main_img
 * @property int $sub_menu
 * @property int $visible
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['name', 'description', 'url'], 'string', 'max' => 50],
            [['left_img', 'main_img'], 'string', 'max' => 255],
            [['sub_menu', 'visible'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'url' => 'Url',
            'left_img' => 'Картинка меню',
            'main_img' => 'Главная картинка',
            'sub_menu' => 'Подкатегории',
            'visible' => 'Отображение',
        ];
    }
}
