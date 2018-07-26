<?php
/**
 * Created by PhpStorm.
 * User: DavydovSS
 * Date: 10.05.2018
 * Time: 16:48
 */

if(!empty($session['cart'])):?>
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
                <td><b><?= $item['category']?></b></td>
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
<? else: ?>
    <h3>Корзина пуста</h3>
<?endif;?>