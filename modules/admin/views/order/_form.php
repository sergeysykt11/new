<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'update_date')->textInput() ?>

<!--    --><?//= $form->field($model, 'count_product')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'type_pay')->dropDownList($typePay) ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => 'Новый заказ', '1' => 'В производстве', '2' => 'Завершен', '3' => 'Отменен']) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+7 (999) 999 99 99',
    ])->textInput(['placeholder' => '+7 (999) 999 99 99']); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_address')->dropDownList($area) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'preorder')->dropDownList(['0' => 'Текучка', '1' => 'Предзаказ']) ?>

    <?= $form->field($model, 'order_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'share')->dropDownList($share) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
