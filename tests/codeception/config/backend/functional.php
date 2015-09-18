<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_BACKEND_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_BACKEND_TEST_ENTRY_URL;

/**
 * Application configuration for backend functional tests
 */

//load local config
$local = require(YII_APP_BASE_PATH . '/config/local.php');

return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    $local['common'],
    require(YII_APP_BASE_PATH . '/backend/config/main.php'),
    $local['backend'],
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/functional.php'),
    require(__DIR__ . '/config.php'),
    [
    ]
);
