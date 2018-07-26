<?php

/* @var $this yii\web\View */

use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Пироги По Коми. '.$category[0]['name'];
?>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div id="left-menu">
                <h3>Категории</h3>
                <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h1 class="name-content"><?= $category[0]['name']; ?></h1>
            <p><b>Минимальная сумма заказа для доставки: 350р.</b></p>
            <?php if($products): ?>
            <?php foreach($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <?= $category['url']; ?>
                    <div class="e-photo all-info" id="<?= $product->id; ?>"><?= \yii\helpers\Html::img("@web/images/menu/{$category[0]['url']}/{$product['image']}", ['alt' => $product['name']])?></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold; height: 50px;"><?= $product['name']; ?></h2>
                        <h2 style="float: left"><?= $product['price'];?> руб.</h2>
                    </div>
                    <? if(getSettingSite('basket')): ?><?= \yii\bootstrap\Html::img('@web/images/site/add-to-cart-dark.png', ['alt'=>'Добавить в корзину', 'width'=>'100px', 'style'=>'    position: absolute;bottom: 50px;width: 55px;right: 15px; cursor: pointer;', 'data-id'=>$product->id, 'class'=>'add-to-car']); ?><? endif; ?>
                    <div class="e-item-menu">
                        <a href=""><div id="<?=$product['id']?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all-info block-hover-red">
                               Подробнее
                            </div></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <? else: ?>
                <?= 'Товаров временно нет'; ?>
            <? endif; ?>

        </div>
    </div>
</div>
