<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_date',
            'update_date',
            'count_product',
            'sum',
            [
                'attribute' => 'area_address',
                'value' => function($data){
                    return \app\models\Orders::getNameAreaById($data->area_address);
                }
            ],
//            'area_address',
            //'type_pay',
            'phone',
            //'address',
//            'comment:ntext',
            //'order_comment:ntext',
            'share',
//            'preorder',
            [
                'attribute' => 'preorder',
                'value' => function($data){
                    if($data->preorder == 0) return 'Текучка';
                    else return 'Предзаказ';
                }
            ],
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
//            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
