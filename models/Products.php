<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 26.04.2018
 * Time: 17:55
 */

namespace app\models;
use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public function getNameAndCategoryById($id){
        $result = Products::find()->where(['id'=>$id])->all();
        return $result[0]->name.' ('.$result[0]->categories->name.')';
    }

    public static function tableName(){
        return 'Product';
    }

//    public function getProducts(){
//        return $this->hasOne(Category::className(), ['id' => 'category_id']);
//    }

    public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

//    public function getIngredients(){
//        return $this->hasMany(IngrPirogs::className(), ['id' => 'pirog_id']);
//    }

    public function getIngridients(){
        return $this->hasMany(Ingredient::className(), ['id'=>'ingr_id'])
            ->viaTable('pirog_ingr', ['pirog_id'=>'id']);
    }

    public static function getListIngridient($product){
        $text = '';
        foreach($product->ingridients as $ingr){
            if($ingr->visible_to_product != 0)
            $text .= $ingr->name.', ';
        };
        return substr($text,0,-2);
    }

    public static function getProductByIngr($productz, $type){
        foreach($productz as $product){
            foreach($product->ingridients as $ingr){
                if($ingr->url == $type) $products[] = $product;
            }
        }
        return $products;
    }
}