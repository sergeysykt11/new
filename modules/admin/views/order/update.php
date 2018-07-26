<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = 'Редактирование заказа №';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) . $model->id ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'typePay' => $typePay,
        'area' => $area,
        'share' => $share
    ]) ?>

</div>