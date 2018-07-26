<!--<a href="/category/--><?//= $cat['url']; ?><!--">-->
<a href="<?= \yii\helpers\Url::to(['category/view', 'url' => $cat['url']]) ?>">
    <li class="item-category">
        <img alt="" src="/images/left-menu/<?=$cat['left_img']?>" class="left-menu-image">
        <span><?=$cat['name']?></span>
    </li>
</a>
<?php if($cat['sub_menu'] == 1):?>
                <ul class="ingredients">
                    <li class="ingr-item"><a href="<?= \yii\helpers\Url::to(['category/view', 'url' => $cat['url']]) ?>" style="font-weight: 600; color: red; border-bottom: 2px dotted red; ">Все пироги</a></li>
                    <?
                    foreach($ingr as $ing): ?>
                    <li class="ingr-item"><a href="<?= \yii\helpers\Url::to(['category/view', 'url' => $cat['url'], 'type' => $ing['url']]) ?>"><? echo $ing['name']; ?></a></li>
                    <?php endforeach; endif; ?>
                </ul>

