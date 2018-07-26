<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 30.04.2018
 * Time: 13:54
 */

namespace app\controllers;
use app\models\Decor;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Category;
use app\models\Products;
use Yii;

class ProductController extends Controller
{
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        $decor = Decor::find()->all();
        if ($product === null){
//            throw new \yii\web\HttpException(404, 'Данного товара не существует');
            return 'Данного товара не существует';
        }
        $listIngr = Products::getListIngridient($product);
        $this->layout = false;
        return $this->render('view', compact('product', 'listIngr', 'decor'));
    }
}