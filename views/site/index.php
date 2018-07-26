<?php

/* @var $this yii\web\View */

$this->title = 'Пироги По Коми';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div id="left-menu">
                <h3>Категории</h3>
                <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
<!--                <a href="/category/yeast"><li class="item-category"><img alt="" src="/images/left-menu/droj.png" class="left-menu-image"><span>-->
<!--				Дрожжевые пироги			</span></li></a>-->
<!--                <ul class="ingredients">-->
<!--                    <li class="ingr-item"><a href="/category/yeast" style="font-weight: 600; color: red; border-bottom: 2px dotted red; ">Все пироги</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/meat">С мясом</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/fish">С рыбой</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/vegetable">С овощами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/fruit">С фруктами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/berry">С ягодами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/cheese">С сыром</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/curd">С творогом</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/yeast/mushrooms">С грибами</a></li>-->
<!--                </ul>-->
<!--                <a href="/category/layer"><li class="item-category"><img alt="" src="/images/left-menu/sloy.png" class="left-menu-image"><span>-->
<!--				Слоеные пироги			</span></li></a>-->
<!--                <ul class="ingredients">-->
<!--                    <li class="ingr-item"><a href="/category/layer" style="font-weight: 600; color: red; border-bottom: 2px dotted red; ">Все пироги</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/meat">С мясом</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/fish">С рыбой</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/vegetable">С овощами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/fruit">С фруктами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/berry">С ягодами</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/cheese">С сыром</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/curd">С творогом</a></li>-->
<!--                    <li class="ingr-item"><a href="/category/layer/mushrooms">С грибами</a></li>-->
<!--                </ul>-->
<!--                <a href="/category/shangi"><li class="item-category"><img alt="" src="/images/left-menu/shangi.png" class="left-menu-image"><span>-->
<!--				Шаньги			</span></li></a>-->
<!--                <a href="/category/chukury"><li class="item-category"><img alt="" src="/images/left-menu/chucury.png" class="left-menu-image"><span>-->
<!--				Чукуры			</span></li></a>-->
<!--                <a href="/category/beverages"><li class="item-category"><img alt="" src="/images/left-menu/napitky.png" class="left-menu-image"><span>-->
<!--				Напитки			</span></li></a>-->
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h1 class="name-content">Выбор категории</h1>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="/category/yeast"><img src="images/category-image/droj1.jpg"></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;">Дрожжевые пироги</h2>
                        <h6>Пироги дрожжевые - вес 1.5 кг.</h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="/category/yeast"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="/category/layer"><img src="images/category-image/sloy1.jpg"></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;">Слоеные пироги</h2>
                        <h6>Пироги слоеные - вес 1.0 кг</h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="/category/layer"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="/category/shangi"><img src="images/category-image/shang.jpg"></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;">Шаньги</h2>
                        <h6>Шаньги - набор от 15 шт</h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="/category/shangi"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="/category/chukury"><img src="images/category-image/chuk.jpg"></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;">Чукуры</h2>
                        <h6>Чукуры - 3-4 шт</h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="/category/chukury"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="entity">
                    <div class="e-photo"><a href="/category/beverages"><img src="images/category-image/123.jpg"></a></div>
                    <div class="e-descr">
                        <h2 style="font-weight: bold;">Напитки</h2>
                        <h6>Напитки</h6>
                    </div>
                    <div class="e-item-menu">
                        <a href="/category/beverages"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span>Открыть меню</span>
                            </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>