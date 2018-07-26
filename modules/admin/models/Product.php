<?php

namespace app\modules\admin\models;

use app\models\IngrPirogs;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $weight
 * @property int $proteins
 * @property int $fats
 * @property int $carbohydrates
 * @property int $calories
 * @property int $category
 * @property int $price
 * @property int $active
 * @property int $visible
 *
 * @property OrderAdditionally[] $orderAdditionallies
 * @property OrderItem[] $orderItems
 * @property ShareProductInCart[] $shareProductInCarts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight', 'proteins', 'fats', 'carbohydrates', 'calories', 'category', 'price', 'active', 'visible'], 'integer'],
            [['category'], 'required'],
            [['name'], 'string', 'max' => 80],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'name' => 'Название',
            'image' => 'Картинка',
            'weight' => 'Вес',
            'proteins' => 'Белки',
            'fats' => 'Жиры',
            'carbohydrates' => 'Углеводы',
            'calories' => 'Калории',
            'category' => 'Категория',
            'price' => 'Цена',
            'active' => 'Активность',
            'visible' => 'Отображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderAdditionallies()
    {
        return $this->hasMany(OrderAdditionally::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShareProductInCarts()
    {
        return $this->hasMany(ShareProductInCart::className(), ['product_id' => 'id']);
    }

    public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    public function getIngrs(){
        return $this->hasMany(IngrPirogs::className(), ['pirog_id', 'id']);
    }
}
