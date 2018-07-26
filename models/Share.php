<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 26.04.2018
 * Time: 17:55
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Share extends ActiveRecord
{
    public static function getNameShareById($id){
        $result = Share::find()->where(['id' => $id])->all();
        return $result[0]->name;
    }

    public static function tableName(){
        return 'share';
    }

    public function getGift($id){
        $result = Share::find()->select('gift')->where(['id'=>$id])->column();
        echo (bool)$result[0];
    }

    public static function getActiveShare($session){
        $currentTime = date('H:i:s');
        $shareList = Share::find()->where("begin_date < '$currentTime' AND end_date > '$currentTime' AND active = 1")->all();
        $idShare[14] = 'Без акции';
        if(count($session['cart']) > 0)
        foreach ($shareList as $share){
            if($share->getLogicShareById($share->logic, $session))
                $idShare[$share->id] = $share->name;
        }
        return $idShare;
    }

    public function getLogicShareById($id, $session){
        switch ($id) {
            case 2: // 5% скидка др
                return true;
                break;
            case 3: // 3 + 1 в подарок
                $cart = $session['cart'];
                $countProduct = 0;
                foreach ($cart as $itemProduct){
                    if($itemProduct['price'] >= 350) $countProduct += $itemProduct['count'];
                    if($countProduct >= 3) return true;
                }
                return false;
                break;
            case 4: // Пироговый чай
                return true;
                break;
            case 5: // 3 по цене 999
                $productListForShare = ShareProductInCart::find()->select(['product_id'])->where(['share_id' => $id])->orderBy('id')->all();
                $nameProduct = [];
                $count = 0;
                foreach ($productListForShare as $product){
                    if(!in_array($product->product->name, $nameProduct)) {
                        $nameProduct[] = $product->product->name;
                        $key = array_search($product->product->name, array_column($session['cart'], 'name'));
                        if($key) $count++;
                    }
                }
                if($count == count($nameProduct)) return true; else return false;
                break;
            case 6: // 3% банк.оплата
                return true;
                break;
            case 7: // Студент и пенсионер
                return true;
                break;
            case 8: // Постоянный клиент
                return true;
                break;
            case 9: // Самовывоз
                return true;
                break;
        }
    }

    public function getLogices(){
        return $this->hasOne(LogicShare::className(), ['id' => 'logic']);
    }

//
//    public function getProducts(){
//        return $this->hasMany(Product::className(), ['category_id' => 'id']);
//    }
}