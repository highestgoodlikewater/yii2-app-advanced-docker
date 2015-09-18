<?php
$local = require(__DIR__ . '/../../config/local.php');
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    $local['common']['params'],
    require(__DIR__ . '/params.php'),
    $local['console']['params']
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
    ],
    'controllerMap' => [
        'db-console' => [
            'class' => 'dizews\dbConsole\DbController'
        ]
    ],
    'params' => $params,
];
