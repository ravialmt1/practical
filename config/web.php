<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'name' => 'Ravichandra',
	//'title' => 'Ravichandra',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
	'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@app/views/themes/preadmin/orange'
             ],
         ],
    ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'PEi6ICsok3vWiJSJJtQV2JZ6D-jk5gkh',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@app/mail',
			'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'ravialmt1@gmail.com',
                'password' => 'sncpvwadvvdltsrd',
				'encryption' => 'tls',
				'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
                'port' => '587',
            ],
			

            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
        'class' => 'dektrium\rbac\components\DbManager',
    ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
		
    ],
	
	
	
	
	'modules' => [
	
	'dynagrid' =>  [
        'class' => '\kartik\dynagrid\Module',
        // your other dynagrid module settings
    ],
	
	
/* 	'students' => [
            'class' => 'app\modules\students\students',
			], */
			
	 /* 'faculty' => [
					'class' => 'app\modules\faculty\attendance',
			       ], */
	/*  'timetable' => [
					'class' => 'app\modules\timetable\timetable',
					], 	 */
	'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
		
		'treemanager' =>  [
          'class' => '\kartik\tree\Module',
          // see settings on http://demos.krajee.com/tree-manager#module
      ],
		
		'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',
 
            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd-m-Y',
                'time' => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
 
            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d', 
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
 
 
 
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
 
        ],
		
		
		
	'reportico' => [
            'class' => 'reportico\reportico\Module' ,
            'controllerMap' => [
                            'reportico' => 'reportico\reportico\controllers\ReporticoController',
                            'mode' => 'reportico\reportico\controllers\ModeController',
                            'ajax' => 'reportico\reportico\controllers\AjaxController',
                        ]
            ],
			'user' => [
    'class' => 'dektrium\user\Module',
    'enableUnconfirmedLogin' => true,
	'enableConfirmation' => true,
    'confirmWithin' => 21600,
    'cost' => 12,
    'admins' => ['sup_user','MD']
],
 
         'rbac' => 'dektrium\rbac\RbacWebModule',
		 'controllerMap' => [
                            'role' =>'app\controllers\RoleController',
                        ]
    
	],
	
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;