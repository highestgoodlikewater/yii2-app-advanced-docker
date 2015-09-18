<?php

require(__DIR__ . '/../../vendor/autoload.php');

//load local config
$local = require(__DIR__ . '/../../config/local.php');

require(__DIR__ . '/../../common/components/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    $local['common'],
    require(__DIR__ . '/../config/main.php'),
    $local['frontend']
);

$application = new yii\web\Application($config);
$application->run();
