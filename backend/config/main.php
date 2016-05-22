<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'Backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
//        'formatter' => [
//            'class' => 'yii\i18n\Formatter',
//            'nullDisplay' => '',
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, //for the testing purpose, you need to enable this
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'ridhobc@gmail.com',
                'password' => '****',
                'port' => '465',
                'encryption' => 'tls',
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'JDqkJaMgIITAKcsJY6yvLQdM9jf7WghX',
        ],
        'pdf' => [
            'class' => 'backend\components\ExportToPdf',
        ],
        'excel' => [
            'class' => 'backend\components\ExportToExcel',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'getid' => [
            'class' => 'backend\components\GetUserId',
        ],
        'dateformatter' => [
            'class' => 'backend\components\DateFormat',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                //'sourceLanguage' => 'en-US',
                /* 'fileMap' => [
                  'app' => 'app.php',
                  'app/error' => 'error.php',
                  ], */
                ],
                'yii*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'course*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'stu*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'emp*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'dash*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'fees*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'report*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'urights*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' =>  'php:d M Y ',
            'datetimeFormat' => 'php:d-m-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'Rs.',
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'UTC',
        'timeZone' => 'Asia/Jakarta',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
    'modules' => [
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other module settings
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        // other module settings
        ],
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module'
        ],
        'dashboard' => 'backend\modules\dashboard\DashboardModule',
        'report' => 'backend\modules\report\Report',
        'bcf15' => 'backend\modules\bcf15\Module',
        'setting' => 'backend\modules\setting\settingModule',
        'penarikan' => 'backend\modules\penarikan\penarikanModule',
        'penyelesaian' => 'backend\modules\penyelesaian\penyelesaianModule',
        
       
        
    ],
];
