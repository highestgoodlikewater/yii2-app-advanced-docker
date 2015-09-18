<?php
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', dirname(dirname(dirname(dirname(__DIR__)))));

/**
 * Application configuration for backend acceptance tests
 */

//load local config
$local = require(YII_APP_BASE_PATH . '/config/local.php');

return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    $local['common'],
    require(YII_APP_BASE_PATH . '/backend/config/main.php'),
    $local['backend'],
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/acceptance.php'),
    require(__DIR__ . '/config.php'),
    [
    ]
);
