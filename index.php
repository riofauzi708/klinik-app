<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/vendor/yiisoft/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// include Yii
require_once($yii);

// create and run the application
Yii::createWebApplication($config)->run();
