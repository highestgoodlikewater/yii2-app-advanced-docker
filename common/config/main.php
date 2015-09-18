<?php

$displayTimezone = 'Europe/Moscow';
$internalTimezone = 'UTC';

return [
    'name' => 'project-name',
    'timeZone' => $internalTimezone,
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage' => '00', //unsupported language code
    'language' => 'ru-RU',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'db' => [
            'class' => 'yii\db\Connection',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'on afterOpen' => function($event) use ($internalTimezone) {
                $event->sender->createCommand("SET TIME ZONE '{$internalTimezone}'")->execute();
            }
//            'schemaCache' => 'cacheSchema',
//            'enableSchemaCache' => true,
//            'queryCache' => 'cache',
//            'enableQueryCache' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'formatter' => [
            'class' => 'common\components\Formatter',
            'currencyCode' => 'RUR',
            'timeZone' => $displayTimezone,
        ],
    ],
];
