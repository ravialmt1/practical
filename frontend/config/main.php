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
	
    'authManager'  => [
        'class'        => 'yii\rbac\DbManager',
        //            'defaultRoles' => ['guest'],
    ],
	'mailer' => [
'class' => 'yii\swiftmailer\Mailer',
'useFileTransport' => false,
'transport' => [
'class' => 'Swift_SmtpTransport',
 
'host' => 'smtp.gmail.com',
'username' => 'ravialmt2',
'password' => 'boxer123',
'port' => '587',
'encryption' => 'tls',
],
],
	'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'],
                'baseUrl' => '@web/themes/adminLTE',
            ],
			],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],*/
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
	'rbac' => [
    'class' => 'githubjeka\rbac\Module',
    'as access' => [ // if you need to set access
      'class' => 'yii\filters\AccessControl',
      'rules' => [
          [
              'allow' => true,
              'roles' => ['@'] // all auth users 
          ],
      ]
    ]
  ],
			'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['admin']
				],
				'dashboard' => [
            'class' => 'frontend\modules\dashboard\Module',
        ],
				'reportico' => [
            'class' => 'reportico\reportico\Module' ,
            'controllerMap' => [
                            'reportico' => 'reportico\reportico\controllers\ReporticoController',
                            'mode' => 'reportico\reportico\controllers\ModeController',
                            'ajax' => 'reportico\reportico\controllers\AjaxController',
                        ]
            ],
],
    'params' => $params,
	
];
