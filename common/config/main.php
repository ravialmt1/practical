<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
		'mail' => [
'class' => 'yii\swiftmailer\Mailer',
'useFileTransport' => false,
'transport' => [
'class' => 'Swift_SmtpTransport',
'host' => 'smtp.gmail.com',
'username' => 'ravialmt2@gmail.com',
'password' => 'boxer123',
'port' => '587',
'encryption' => 'ssl',
],
],
    ],
	'modules' => [
			'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['admin']
				],
],

];
