<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 10.05.2018
 * Time: 16:13
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

    public function dellToCart($product){
        $count = 0;
        if($_SESSION['inscription']) {
            foreach ($_SESSION{'inscription'} as $key => $value) {
                if ($value['idProduct'] == $product->id)
                    $count++;
            }

            if ($count == $_SESSION['cart'][$product->id]['count']) {
                foreach ($_SESSION['inscription'] as $key => $item) {
                    if ($item['idProduct'] == $product->id) {
                        unset($_SESSION['inscription'][$key]);
                        $_SESSION['cart.sum'] -= 100;
                        break;
                    }
                }
            }
        }

        if($_SESSION['decor']) {
            $count = 0;
            foreach ($_SESSION{'decor'} as $key => $value) {
                if ($value['idProduct'] == $product->id)
                    $count++;
            }

            if ($count == $_SESSION['cart'][$product->id]['count']) {
                foreach ($_SESSION['decor'] as $key => $item) {
                    if ($item['idProduct'] == $product->id) {
                        $_SESSION['cart.sum'] -= $_SESSION['decor'][$key]['price'];
                        unset($_SESSION['decor'][$key]);
                        break;
                    }
                }
            }
        }


        if($_SESSION['cart'][$product->id]['count'] == 1) self::delitem($product->id);
        else {
            $_SESSION['cart'][$product->id]['count']--;
            $_SESSION['cart.sum'] -= $_SESSION['cart'][$product->id]['price'];
            $_SESSION['cart.count']--;
        }
    }

    public function deliteminrip($id){
        if(!isset($_SESSION['inscription'][$id])) return false;
        $_SESSION['cart.sum'] -= 100;
        unset($_SESSION['inscription'][$id]);
    }

    public function delitemdecor($id){
        if(!isset($_SESSION['decor'][$id])) return false;
        $_SESSION['cart.sum'] -= $_SESSION['decor'][$id]['price'];
        unset($_SESSION['decor'][$id]);
    }

    public function delitem($id){
        if(!isset($_SESSION['cart'][$id])) return false;
        if($_SESSION['inscription']) {
            foreach ($_SESSION['inscription'] as $key => $item) {
                if ($item['idProduct'] == $id) {
                    unset($_SESSION['inscription'][$key]);
                    $_SESSION['cart.sum'] -= 100;
                }
            }
        }
        if($_SESSION['decor']) {
            foreach ($_SESSION['decor'] as $key => $item) {
                if ($item['idProduct'] == $id) {
                    $_SESSION['cart.sum'] -= $_SESSION['decor'][$key]['price'];
                    unset($_SESSION['decor'][$key]);
                }
            }
        }
        $countMinus = $_SESSION['cart'][$id]['count'];
        $sumMinus = $_SESSION['cart'][$id]['count'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.count'] -= $countMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

    public function addToCart($product, $inscription, $decor, $count = 1){
        $_SESSION['ind']++;
        $price = Decor::find()->where(['id'=>$decor])->asArray()->all();
        $price = $price[0]['price'];
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['count'] += $count;
        } else {
            $_SESSION['cart'][$product->id] = [
                'count' => $count,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'category' => $product->categories->name,
            ];
        }
        $i = $_SESSION['ind'];
        $_SESSION['cart.count'] = isset($_SESSION['cart.count']) ? $_SESSION['cart.count'] + $count : $count;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $count * $product->price : $count * $product->price;
        if($inscription && strlen($inscription) > 0) {
            $_SESSION['inscription'][$i] = [
                'idProduct' => $product->id,
                'text' => $inscription
            ];
            $_SESSION['cart.sum'] += 100;
        }
        if($decor != 1) {
            $_SESSION['decor'][$i] = [
                'idProduct' => $product->id,
                'decor' => $decor,
                'price' => $price
            ];
            $_SESSION['cart.sum'] += $price;
        }
    }

}