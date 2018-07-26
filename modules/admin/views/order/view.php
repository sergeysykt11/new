<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1>Номер заказа: №<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?
    $items = $model->orderItems;
    $additional = $model->orderAdditionallies;
    ?>

    <h2>Товары</h2>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $id => $item): ?>
            <tr>
                <td><?= $item['name']?></td>
                <td><?= $item['count_item']?> </td>
                <td><?= $item['price']?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

    <h2>Дополнение</h2>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Вид</th>
            <th>Надпись</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($additional as $id => $item): ?>
            <tr>
                <td><?= \app\models\Products::getNameAndCategoryById($item['product_id'])?></td>
                <td><?= \app\models\Decor::getNameById($item['decor']) ?> </td>
                <td><?= $item['inscription']?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

    <h2>Общее</h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'create_date',
            'update_date',
//            'count_product',
            'sum',
            [
                'attribute' => 'type_pay',
                'value' => $typePay
            ],
//            'status',
            [
                'attribute' => 'status',
                'value' => function($data){
                    switch ($data->status){
                        case 0:
                            return '<span class="text-danger"><b>Новый заказ</b></span>';
                            break;
                        case 1:
                            return '<span class="text-success"><b>В производстве</b></span>';
                            break;
                        case 2:
                            return 'Завершен';
                            break;
                        case 3:
                            return '<b class="text-danger"><i>Отменен</i></b>';
                            break;
                    }
                },
                'format' => 'raw'
            ],
            'phone',
            'address',
            [
                    'attribute' => 'area_address',
                    'value' => $nameArea
            ],
            'comment:ntext',
            'preorder',
            'order_comment:ntext',
            [
                    'attribute' => 'share',
                    'value' => $nameShare
            ],
        ],
    ]) ?>



</div>
