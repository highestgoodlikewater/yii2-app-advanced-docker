<?php
$local = require(__DIR__ . '/../../config/local.php');
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    $local['common']['params'],
    require(__DIR__ . '/params.php'),
    $local['frontend']['params']
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
