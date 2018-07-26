<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 13.05.2018
 * Time: 20:11
 */
use yii\helpers\Html;
use yii\helpers\Url;


?>
<div id="loading">
    <img src="http://www.defo.ru/images/loader.gif" width="10%" style="margin-top: 100px;" alt="">
</div>
<div class="container">
    <?php if(Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissable" role="alert">Успешно</div>
    <? elseif(Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">Ошибка оформления заказа</div>
    <? endif; ?>
    <?if(!empty($session['cart'])):?>
        <h3>Продукты в корзине</h3>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Тип</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?= $item['category']?></td>
                    <td><?= $item['name']?></td>
                    <td><span data-id="<?= $id; ?>" class="glyphicon glyphicon-minus text-primary minus-item"></span> <?= $item['count']?> <span data-id="<?= $id; ?>" class="glyphicon glyphicon-plus text-primary add-item" aria-hidden="true"></span></td>
                    <td><?= $item['price']?></td>
                    <td><span data-id="<?= $id; ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
                <?php if($session['decor']) foreach ($session['decor'] as $key => $value): ?>
                    <?php if($id == $value['idProduct']):?>
                        <tr>
                            <td>  <i>Украшение</i></td>
                            <td><i><?= \app\models\Decor::getNameById($value['decor'])?></i></td>
                            <td>1</td>
                            <td><?= $value['price']?></td>
                            <td><span data-id="<?= $key; ?>" class="glyphicon glyphicon-remove text-danger del-item-decor" aria-hidden="true"></span></td>
                        </tr>
                    <?php endif; ?>
                <? endforeach; ?>
                <?php if($session['inscription']) foreach ($session['inscription'] as $key => $value): ?>
                    <?php if($id == $value['idProduct']):?>
                        <tr>
                            <td>  <i>Надпись</i></td>
                            <td><i><?= $value['text']?></i></td>
                            <td>1</td>
                            <td>100</td>
                            <td><span data-id="<?= $key; ?>" class="glyphicon glyphicon-remove text-danger del-item-insrip" aria-hidden="true"></span></td>
                        </tr>
                    <?php endif; ?>
                <? endforeach; ?>
            <? endforeach; ?>
            <tr>
                <td colspan="4">Общее количество</td>
                <td><?= $session['cart.count'] ?></td>
            </tr>
            <tr>
                <td colspan="4">Сумма:</td>
                <td id="all-price-product"><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
        <hr/>
        <h3>Информация по доставке</h3>
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>
        <?= $form->field($order, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '+7 (999) 999 99 99',
        ])->textInput(['placeholder' => '+7 (999) 999 99 99']); ?>
        <?= $form->field($order, 'area_address')->dropDownList($priceArea);?>
        <?= $form->field($order, 'address'); ?>
        <?= $form->field($order, 'comment')->textarea(); ?>
        <?= $form->field($order, 'type_pay')->dropDownList($typePay); ?>
        <?= $form->field($order, 'share')->dropDownList($shareListActive); ?>
        <?= $form->field($order, 'preorder')->checkbox(); ?>
        <div id="gift-product">
            <h3>Подарочные пироги</h3>
        <?
        for($i = 0; $i < floor($session['cart.count']/3) ; $i++)
            echo $form->field($order, "gift[$i]")->dropDownList($giftProduct);
//            echo $form->field($order, "test[$i]");
        ?>
        </div>
        <?= Html::submitButton('Заказать', ['class'=>'btn btn-success']) ?>
        <?php $form = \yii\widgets\ActiveForm::end(); ?>

    <? else: ?>

        <h3>Корзина пуста</h3>
    <?endif;?>
</div>
