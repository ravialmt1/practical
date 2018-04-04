<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-practical-frontend',
	'name'=>'Mishika SMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
	'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'],
                'baseUrl' => '@web/themes/adminLTE',
            ],
			],
			'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
    'class' => 'app\components\User',
    'identityClass' => 'dektrium\user\models\User',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ]
    ],
	'modules' => [
        'workflow' => [
            'class' => 'cornernote\workflow\manager\Module',
        ],
		'redactor' => 'yii\redactor\RedactorModule',
		'user' => [
        'class' => 'dektrium\user\Module',
        // you will configure your module inside this file
        // or if need different configuration for frontend and backend you may
        // configure in needed configs
    ],
    ],
    'params' => $params,
];
