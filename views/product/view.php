<div class="product">
    <p><span></span></p><h1><?=

        $product->name; ?></h1>
    <p class="bg-danger" style="display: inline-block">Внимание! Внешний вид товара может отличаться от картинки</p>
    <p><?= \yii\helpers\Html::img('@web/images/menu/'.$product->categories->url.'/'.$product->image, ['id'=>'photo-top'])?></p>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    </div>
    <span><b>Вес: </b><?= $product->weight; ?>г.<br></span>
    <b>Состав: </b><?= $listIngr ?><br><p></p>
    <p><b>Пицевая ценность</b> (содержание в 100г продукта)<br>
        <span><b>Белки/Жиры/Углеводы</b>: <?= $product->proteins.'/'.$product->fats.'/'.$product->carbohydrates?></span><br>
        <span><b>Каллории: </b><?= $product->calories; ?></span></p>
    <p></p><h4><b>Цена:</b> <?= $product->price ?> руб.</h4><p></p>
    <? if(getSettingSite('basket')): ?>
        <?php if($product->category == 1 || $product->category == 2): ?>
        <label for="inscription-product" class="control-label text-danger">Надпись (до 20 символов) (+100 рублей)</label>
        <input type="text" id="inscription-product" maxlength="20" class="form-low-me form-control">
        <? endif; ?>

        <?php if($product->category == 1): ?>
            <label for="decor" class="control-label text-danger">Вид пирога</label>
            <select class="form-control form-low-me" name="decor" id="decor">
                <? foreach ($decor as $item) :?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'].' (+'.$item['price'].'руб.)';?></option>
                <? endforeach; ?>
            </select>
        <? endif; ?>

        <p style="display: inline-block; cursor: pointer;" class="add-to-car" id="<?= $product->id; ?>" data-id="<?= $product->id; ?>"><?= \yii\bootstrap\Html::img('@web/images/site/add-to-cart-dark.png', ['alt'=>'Добавить в корзину', 'width'=>'100px']); ?></p>
    <? endif; ?>
</div>