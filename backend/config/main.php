<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language' =>'en',
    'sourceLanguage' =>'en',
    'bootstrap' => ['log'],
    'modules' => [
        'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],
    ],
    'components' => [
        
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
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
        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer', 
            'useFileTransport' => false,
            
        ],
        
            'authManager' =>
            [
                'class' => 'yii\rbac\DbManager',
                'defaultRoles' => ['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'MyComponent'=>[
            'class'=>'backend\components\MyComponent', 
        ],
        ],
        
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    'as beforeRequest'=>[
        'class'=>'backend\components\CheckIfLoggedIn', 
    ],
    'params' => $params,
];
