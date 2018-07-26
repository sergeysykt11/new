<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container">
        <div class="row">
		<div class="col-xs-3 col-sm-3 hidden-md hidden-lg" style='position: absolute;
    top: 0;
    right: 70px;
    z-index: 99999;' id='go-to-bask'>Корзина <span id="all-sum"><?= $_SESSION['cart.sum'] ? $_SESSION['cart.sum'] : '0'; ?></span> руб.</div>
            <a href="<?= \yii\helpers\Url::home() ?>"><div id='logo-header' class='col-lg-4 col-md-4 col-sm-6 col-xs-6'><?= \yii\helpers\Html::img("@web/images/site/logo-header.png", ['alt' => 'Логотип компании', 'width' => '100%'])?></div></a>
            <div id='phone-header' class='col-lg-4 col-md-4 col-sm-6 col-xs-6'><?= \yii\helpers\Html::img("@web/images/site/phone-header.png", ['alt' => '33-55-55 - телефон компании', 'width' => '100%'])?></div>
            <div id='bat-aut-header' class='col-lg-4 col-md-4 hidden-sm hidden-xs'>
                <?= \yii\helpers\Html::img("@web/images/site/block-duga-rigth.png", ['alt' => 'Украшение', 'width' => '100%', 'id' => 'duga-img'])?>
                <div id="right-header-text">
                    <? if(getSettingSite('basket')): ?>
                        <p>Общая сумма: <span id="all-sum"><?= $_SESSION['cart.sum'] ? $_SESSION['cart.sum'] : '0'; ?></span> руб. <br><span id="go-to-bask">Перейти в корзину</span></p>
                    <? else: ?>
                        <p>К сожалению корзина не доступна<br>в данный момент</p>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-12">			
            <nav id="main-navigation">
                <a href="<?= \yii\helpers\Url::home() ?>">Меню</a>
                <a href="<?= \yii\helpers\Url::toRoute(['share/index'])?>">Акции</a>
                <a href="<?= \yii\helpers\Url::toRoute(['site/contact'])?>">Контакты</a>
                <a href="<?= \yii\helpers\Url::toRoute(['site/return'])?>">Условия возврата</a>
                <div class="hidden-lg hidden-md"> <div id="show-menu"><?= \yii\helpers\Html::img("@web/images/site/show-menu.png", ['alt' => 'Раскрыть меню'])?></div></div>
            </nav>
        </div>
    </div>
</div>

<?= $content; ?>

<footer>
    <div class="container">
        <div class="row">
            <div id="del"><hr style="border-style: inset;border-color: #fff;"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 left-f">
                <h3>Наш телефон:<br>
                    <span>33-55-55</span></h3>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center-f">
                <strong>Режим работы: <br>
                    Будние дни: 09:00 - 20:00 <br>
                    Выходные: 10:00 - 20:00<br></strong>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 right-f">
                <h3>Мы в ВК:<br></h3><a target="_blank" href="https://vk.com/pirogipokomi"><?= \yii\helpers\Html::img("@web/images/site/vk.png", ['alt' => 'Группа вк', 'width' => '100%', 'style' => 'margin-top:-10px; width: 10%; display: inline-block;'])?></a>
            </div>
        </div>
    </div>
</footer>

<?php
    \yii\bootstrap\Modal::begin([
        'header' => '<h2>Корзина</h2>',
        'id' => 'cart-modal',
        'size' => 'modal-lg',
        'footer' => '    <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
                        <a href="'. \yii\helpers\Url::to(['cart/view']).'" class="btn btn-primary">Оформить заказ</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Продолжить покупки</button>                        
                        '
    ]);

    \yii\bootstrap\Modal::end();

    if(getSettingSite('basket'))
        $footer = '<button type="button" class="btn btn-success" data-dismiss="modal">Вернуться</button>                        
                        <button type="button" class="btn btn-primary open-cart">Перейти в корзину</button>';
    else $footer = '<button type="button" class="btn btn-success" data-dismiss="modal">Вернуться</button>';

\yii\bootstrap\Modal::begin([
    'header' => '<h2>Продукт</h2>',
    'id' => 'product-modal',
    'size' => 'modal-lg',
    'footer' => $footer
]);

\yii\bootstrap\Modal::end();

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>