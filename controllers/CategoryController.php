<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 27.04.2018
 * Time: 17:15
 */

namespace app\controllers;
use app\models\Ingredient;
use app\models\IngrPirogs;
use yii\base\Controller;
use app\models\Category;
use app\models\Products;
use Yii;

class CategoryController extends Controller
{
    public function actionIndex(){
//        $product = Products::findOne(1);
//        print_r($product->categories->name);
        $category = Category::find()->where('visible=1')->all();
        return $this->render('index', compact('category'));
    }


    public function actionView()
    {
        $url = Yii::$app->request->get('url');
        $type = Yii::$app->request->get('type');
        $category = Category::find()->select('id, name, url')->where(['url' => $url])->asArray()->all();
        if (empty($category)){
            throw new \yii\web\HttpException(404, 'Данной категории не существует');
        }
        $products = Products::find()->where(['category' => $category[0]['id']])->all();
        if(!empty($type)) $products = Products::getProductByIngr($products, $type);
        return $this->render('view', compact('products', 'category'));
    }
}