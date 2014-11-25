<?php
date_default_timezone_set('America/Detroit');

$yii = dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';
require_once($yii);

Yii::createWebApplication($config)->run();
?>