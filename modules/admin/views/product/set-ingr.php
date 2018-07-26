<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.05.2018
 * Time: 22:29
 */

use http\Url;
use yii\widgets\ActiveForm;

?>

<h1><?= 'Ингредиенты для '.$product->name; ?></h1>

<?
    $form = ActiveForm::begin();
    foreach ($allIngr as $ingr){
        if(array_search($ingr->id, $arrayIngr)) $checked = true; else $checked = false;
        echo \yii\helpers\Html::checkbox('test[]', $checked, ['label' => $ingr->name, 'value' => $ingr->id]);
        echo '<br>';
    }
    echo \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-success']);
    ActiveForm::end();
?>
