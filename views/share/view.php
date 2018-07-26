<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = $share->name;
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="one-share" style="text-align: center">
                <h1><?= $share->name; ?></h1>
                <p><?= Html::img('@web/images/share/'.$share->image, ['width'=>'50%', 'alt'=>'Фото акции'])?></p>
                <p><span></span></p><h3>Условия: <?= $share->description?></h3><br>
                <a href="<?= \yii\helpers\Url::toRoute(['share/index'])?>" class="knopka">Назад</a>
                <p></p><br>
            </div>
        </div>
    </div>
</div>