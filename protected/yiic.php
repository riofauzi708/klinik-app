<?php
// Define path to Yii framework
$yiic = dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yiic.php';
// Define path to application configuration
$config = dirname(__FILE__).'/config/console.php';

// Debugging: Check if config file is loaded
if (file_exists($config)) {
    echo "Config file loaded: $config\n";
} else {
    echo "Config file not found: $config\n";
}

require_once($yiic);
