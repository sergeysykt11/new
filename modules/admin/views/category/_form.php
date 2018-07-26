<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'left_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_menu')->dropDownList(['0'=>'Нет', '1' => 'Есть']) ?>

    <?= $form->field($model, 'visible')->dropDownList(['0'=>'Не отображать', '1' => 'Отображать']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
