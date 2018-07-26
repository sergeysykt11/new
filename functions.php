<?php

function debug($arr){
    echo '<pre>'.print_r($arr, true).'</pre>';
}

function getSettingSite($param){
    $configSite = \app\models\Site::find()->asArray()->all();
    return $configSite[0][$param];
}