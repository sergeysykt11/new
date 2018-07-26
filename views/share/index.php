<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Акции';
?>

<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="name-content">Акции</h1>
        <?php foreach($shares as $share):?>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <div class="Shares">
                <a href="<?= \yii\helpers\Url::toRoute(['share/view', 'id'=>$share->id])?>"><?= Html::img('@web/images/share/'.$share->image, ['width'=>'100%', 'alt'=>'Фото акции'])?></a>
                <div class="share-desc"><?= $share->name?></div>
                <div class="e-item-menu">
                    <a href="<?= \yii\helpers\Url::toRoute(['share/view', 'id'=>$share->id])?>"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span>Подробнее</span>
                        </div></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>