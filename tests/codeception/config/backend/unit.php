<?php

/**
 * Application configuration for backend unit tests
 */
//load local config
$local = require(YII_APP_BASE_PATH . '/config/local.php');

return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/main.php'),
    $local['common'],
    require(YII_APP_BASE_PATH . '/backend/config/main.php'),
    $local['backend'],
    require(dirname(__DIR__) . '/config.php'),
    require(dirname(__DIR__) . '/unit.php'),
    require(__DIR__ . '/config.php'),
    [
    ]
);
