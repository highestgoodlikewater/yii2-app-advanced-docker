<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

require(__DIR__ . '/../../vendor/autoload.php');

//load local config
$local = require(__DIR__ . '/../../config/local.php');

require(__DIR__ . '/../../common/components/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = require(__DIR__ . '/../../tests/codeception/config/backend/acceptance.php');

$application = new yii\web\Application($config);
$application->run();
