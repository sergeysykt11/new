<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
?>

<div class="container" style="text-align: center">
<div id="contact-site">
    <h1 class="name-content">Контактная информация</h1>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="maps">
            <p>Мы находимся по адресу: <br><b>г. Сыктывкар, ул. Гаражная 11</b></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.480215498121!2d50.82019204791539!3d61.65804189940529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43f7d4b7cd4e8a57%3A0x64d4b5dfabdc3ab0!2z0YPQuy4g0JPQsNGA0LDQttC90LDRjywgMTEsINCh0YvQutGC0YvQstC60LDRgCwg0KDQtdGB0L8uINCa0L7QvNC4LCAxNjcwMDQ!5e0!3m2!1sru!2sru!4v1486108594664" style="border:0" allowfullscreen="" width="100%" height="450" frameborder="0"></iframe>
        </div>
    </div>
    <br><br>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="contact-info">
            <p>Телефон заказа: 8 (8212) <b>33-55-55</b><br>
                <b>Режим работы:</b><br>
                Будни с 09:00 до 20:00 <br>
                Сб, Вс с 10:00 до 20:00, без выходных</p><br><br>
            <p><small>Не является публичной офертой. Вся информация предоставлена в ознакомительных целях	<br>
                    ИП Надуева Анастасия Вячеславна,
                    факт. адрес - гаражная, 11 <br>
                    ИНН 110116817760 	<br>
                    ОГРН 313110132200030 <br>
                    Отделение №8617 Сбербанка России г. Сыктывкар <br>
                    БИК 048702640 <br></small></p>
            <h4><a href="https://vk.com/im?sel=240968939" style="color:red;"><b>Обратная связь</b></a></h4>
        </div>
    </div>
</div>
</div>