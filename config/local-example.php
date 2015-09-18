<?php


//defined('YII_DEBUG') or define('YII_DEBUG', false);
//defined('YII_ENV') or define('YII_ENV', 'prod');
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$config = [
    //------------------------- Common -------------------------

    'common' => [
        'components' => [
            //Коннект к базе данных
            'db' => [
                'dsn' => 'pgsql:host=db;dbname=database-username',
                'username' => 'database-username',
                'password' => 'password'
            ],

            //Отправки почты
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => true,
            ],
        ],

        'params' => [
        ]
    ],


    //------------------------- Backend -------------------------
    'backend' => [
        'components' => [
            'request' => [
                // ключ для проверки кук для повышения уровня безопасности при работе с сервером
                'cookieValidationKey' => '',
            ],
        ],

        'params' => []
    ],

    //------------------------- API -----------------------------

    'frontend' => [
        'components' => [
            'request' => [
                // ключ для проверки кук для повышения уровня безопасности при работе с сервером
                'cookieValidationKey' => '',
            ],
        ],

        'params' => []
    ],


    //------------------------- Console -------------------------

    'console' => [
        'components' => [
        ],

        'params' => []
    ],


];


if (!(YII_ENV == 'test')) {
    // configuration adjustments for 'dev' environment
    $allowedIps = ['127.0.0.1', '::1', '192.168.99.*'];

    $conf['bootstrap'][] = 'debug';
    $conf['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => $allowedIps
    ];

    $conf['bootstrap'][] = 'gii';
    $conf['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => $allowedIps
    ];

    $config['backend'] = array_merge($config['backend'], $conf);
    $config['frontend'] = array_merge($config['frontend'], $conf);
}


return $config;