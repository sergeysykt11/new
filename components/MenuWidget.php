<?php

/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 27.04.2018
 * Time: 10:50
 */

namespace app\components;
use app\models\Ingredient;
use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $dataSubMenu;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }

        $this->tpl .= '.php';
    }

    public function run()
    {
        // get cache
//        $menu = Yii::$app->cache->get('menu');
//        if($menu) return $menu;
        $this->data = Category::find()->asArray()->where('visible=1')->all();
        $this->dataSubMenu = Ingredient::find()->asArray()->where('sub_menu_visible=1')->all();
        $this->menuHtml = $this->getMenuHtml($this->data, $this->dataSubMenu);
        // set cache
//        Yii::$app->cache->set('menu', $this->menuHtml, 1);
        return $this->menuHtml;
    }

    public function getMenuHtml($category, $ingr){
        $str = '';
        foreach($category as $cat){
            $str .= $this->generageHtml($cat, $ingr);
        }
        return $str;
    }

    public function generageHtml($cat, $ingr){
        ob_start();
        include __DIR__.'/menu_tpl/'.$this->tpl;
        return ob_get_clean();
    }


}