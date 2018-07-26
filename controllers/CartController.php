<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 10.05.2018
 * Time: 16:11
 */

namespace app\controllers;

use app\models\AreaAddress;
use app\models\Decor;
use app\models\LogicShare;
use app\models\OrderAdditionally;
use app\models\Pay;
use app\models\Share;
use app\models\ShareProductInCart;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Products;
use app\models\Cart;
use app\models\OrderItem;
use app\models\Orders;


class CartController extends Controller
{

    public static function dellDiscTypeAndValue($session, $post){
        $id = $post['Orders']['share'];
        switch ($id) {
            case 14: // без акции
                return true;
                break;
            case 5: // День рождение 5%
                $session['cart.sum'] /= 0.95;
                return true;
                break;
            case 6: // Подарочные
                foreach($post['Orders']['gift'] as $gift){
                    self::actionDelItem($gift, 1);
                }
                print_r($session['cart']);
                break;
            case 7: // пироговый час
                $session['cart.sum'] /= 0.95;
                return true;
                break;
            case 8: // Мега трио
                if(Share::getLogicShareById($id, $session)) {
                    $idLogic = Share::findOne($id);
                    $productListForShare = ShareProductInCart::find()->select(['product_id'])->where(['share_id' => $idLogic->logic])->column();
                    $idList = (implode(',', $productListForShare));
                    $priceAll = Products::find()->select('sum(price)')->where("id IN ($idList)")->groupBy('name')->column();
                    $difference = $priceAll[0] - 999;
                    $session['cart.sum'] += $difference;
                    return true;
                    break;
                }
                else echo 'netest';
                die('Ошибка');
                break;
            case 10: // Карточная выгода
                $session['cart.sum'] /= 0.97;
                return true;
                break;
            case 11:
                $session['cart.sum'] /= 0.95;
                return true;
                break;
            case 12:
                return true;
                break;
            case 13:
                $session['cart.sum'] += 77;
                return true;
                break;

        }
    }

    public static function getDiscTypeAndValue($session, $post){
        $id = $post['Orders']['share'];
        switch ($id) {
            case 14: // без акции
                return true;
                break;
            case 5: // День рождение 5%
                $session['cart.sum'] *= 0.95;
                return true;
                break;
            case 6: // Подарочные
                foreach($post['Orders']['gift'] as $gift){
                    self::actionAdd($gift, 1);
                }
                break;
            case 7: // пироговый час
                $session['cart.sum'] *= 0.95;
                return true;
                break;
            case 8: // Мега трио
                if(Share::getLogicShareById($id, $session)) {
                    $idLogic = Share::findOne($id);
                    $productListForShare = ShareProductInCart::find()->select(['product_id'])->where(['share_id' => $idLogic->logic])->column();
                    $idList = (implode(',', $productListForShare));
                    $priceAll = Products::find()->select('sum(price)')->where("id IN ($idList)")->groupBy('name')->column();
                    $difference = $priceAll[0] - 999;
                    $session['cart.sum'] -= $difference;
                    return true;
                    break;
                }
                else echo 'netest';
                die('Ошибка');
                break;
            case 10: // Карточная выгода
                $session['cart.sum'] *= 0.97;
                return true;
                break;
            case 11:
                $session['cart.sum'] *= 0.95;
                return true;
                break;
            case 12:
                return true;
                break;
            case 13:
                $session['cart.sum'] -= 77;
                return true;
                break;

        }
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Orders();
        $area = AreaAddress::find()->all();
//        $this->saveOrderAdd($session['ind'], $session['decor'], $session['inscription'], 1);
        $priceArea = ArrayHelper::map($area,'id','name');
        $typePay = ArrayHelper::map((Pay::find()->all()), 'id', 'name');
        $shareListActive = Share::getActiveShare($session);
        $giftProduct = ArrayHelper::map((Products::find()->where(['category'=>'6'])->all()), 'id', 'name');

        if($order->load(Yii::$app->request->post())){
            self::getDiscTypeAndValue($session, Yii::$app->request->post()); // Выбранную акцию активировать и применить скидку
            self::areaPrice($session, Yii::$app->request->post(), $area); // Проверка на зону доставки и добавить сумму при условии.
            $order->count_product = $session['cart.count'];
            $order->sum = $session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                $this->saveOrderAdd($session['ind'], $session['decor'], $session['inscription'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                $session->remove('cart');
                $session->remove('inscription');
                $session->remove('decor');
                $session->remove('cart.sum');
                $session->remove('cart.count');
                $session->remove('ind');
                return $this->refresh();
            } else {
                self::dellDiscTypeAndValue($session, Yii::$app->request->post()); // Отменяем акцию, в случае ошибки.
                self::areaPriceLast($session, Yii::$app->request->post(), $area); // Возвращаем прежднюю сумму, в случае ошибки
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }

        return $this->render('view', compact('order', 'session', 'giftProduct', 'priceArea', 'typePay', 'shareListActive'));
    }

    public function areaPrice($session, $post, $infoArea){
        $area = $post['Orders']['area_address'];
        foreach ($infoArea as $item){
            if($item->id == $area) {
                if($item->price > $session['cart.sum'])
                    $session['cart.sum'] += $item->min_price;
            }
        }
        return true;
    }

    public function areaPriceLast($session, $post, $infoArea){
        $area = $post['Orders']['area_address'];
        foreach ($infoArea as $item){
            if($item->id == $area) {
                if($item->price > $session['cart.sum'])
                    $session['cart.sum'] -= $item->min_price;
            }
        }
        return true;
    }

    public function actionAdd($id, $noRender = 0){
        if(getSettingSite('basket')) {
            if($noRender == 0)
                $id = Yii::$app->request->get('id');
            $inscription = Yii::$app->request->get('inscription');
            $decor = Yii::$app->request->get('decor');
            if(!$decor) $decor = 1;
            if(strlen($inscription) > 40) {
                return 'big-text';
            }
            $product = Products::findOne($id);
            if (empty($product) || ($product->active == 0)) return false;
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product, $inscription, $decor);
            if($noRender == 1) return true;
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        } else return 'no-cart';
    }

    public function actionShow(){
        if(getSettingSite('basket')) {
            $session = Yii::$app->session;
            $session->open();
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        } else return 'no-cart';
    }

    public function actionMinus(){
        if(getSettingSite('basket')) {
            $id = Yii::$app->request->get('id');
            $product = Products::findOne($id);
            if(empty($product) || ($product->active == 0)) return false;
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->dellToCart($product);
            $this->layout = false;
            return $this->render('cart-modal', compact('session'));
        } else return 'no-cart';
    }

    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('inscription');
        $session->remove('decor');
        $session->remove('cart.sum');
        $session->remove('cart.count');
        $session->remove('ind');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItemInsrip($id){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->deliteminrip($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItemDecor($id){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->delitemdecor($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem($id, $noRender = 0){
        if($noRender == 0)
            $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->delitem($id);
        if($noRender == 1) return true;
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function saveOrderItems($items, $orderId){
        foreach ($items as $id => $item){
            $orderItems = new OrderItem();
            $orderItems->order_id = $orderId;
            $orderItems->product_id = $id;
            $orderItems->name = $item['name'] . ' (' . $item['category'] . ')';
            $orderItems->price = $item['price'];
            $orderItems->count_item = $item['count'];
            $orderItems->save();
        }
    }

    public function saveOrderAdd($count, $decor, $inscription, $orderId){
        for ($i = 1; $i <= $count; $i++){
            $id = $decor[$i]['idProduct'];
            if(!$id) $id = $inscription[$i]['idProduct'];
            if(!$id) continue;
            $orderAdditionally = new OrderAdditionally();
            $orderAdditionally->order_id = $orderId;
            $orderAdditionally->product_id = $id;
            $orderAdditionally->decor = $decor[$i]['decor'];
            $orderAdditionally->inscription = $inscription[$i]['text'];
            $orderAdditionally->save();
        }
    }
}