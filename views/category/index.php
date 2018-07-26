<?php

/* @var $this yii\web\View */

$this->title = 'Пироги По Коми';
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
            <h1 class="name-content">Выбор категории</h1>
            <?php foreach ($category as $item): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="<?= \yii\helpers\Url::to(['category/view', 'url' => $item['url']]) ?>"><?= \yii\helpers\Html::img("@web/images/category-image/{$item->main_img}", ['alt' => $item->name])?></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;"><?=$item->name;?></h2>
                        <h6><?=$item->description;?></h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="<?= \yii\helpers\Url::to(['category/view', 'url' => $item['url']]) ?>"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>