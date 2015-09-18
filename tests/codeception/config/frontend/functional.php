<?php
$_SERVER['SCRIPT_FILENAME'] = FRONTEND_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = FRONTEND_ENTRY_URL;

/**
 * Application configuration for frontend functional tests
 */
//load local config
$local = require(YII_APP_BASE_PATH . '/config/local.php');

return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    $local['common'],
    require(YII_APP_BASE_PATH . '/frontend/config/main.php'),
    $local['frontend'],
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/functional.php'),
    require(__DIR__ . '/config.php'),
    [
    ]
);
