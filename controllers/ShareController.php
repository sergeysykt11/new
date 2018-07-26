<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 08.05.2018
 * Time: 14:15
 */

namespace app\controllers;


use app\models\Share;
use Yii;
use yii\base\Controller;

class ShareController extends Controller
{
    public function actionIndex(){
        $shares = Share::find()->all();
        return $this->render('index', compact('shares'));
    }

    public function actionGetGift(){
        $id = Yii::$app->request->get('id');
        $share = new Share();
        echo($share->getGift($id));
    }

    public function actionView(){
        $share = Share::findOne(Yii::$app->request->get('id'));
        return $this->render('view', compact('share'));
    }
}