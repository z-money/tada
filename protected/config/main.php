<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tada',
	'defaultController' => 'task/index',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.forms.*',
	),

	'modules'=>array(
		'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'5thisdo4h',
        ),
	),

	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				//STANDARD RULES
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db' => array(
			'connectionString' => 'mysql:host=127.0.0.1;port=8889;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=tada',
			'username' => 'root',
			'password' => 'root',
			'emulatePrepare' => true,
			'charset' => 'utf8',
		),
		'user' => array(
			'allowAutoLogin' => true,
		),
		'clientScript'=>array(
            'packages'=>array(
                'jquery'=>array(
                    'js'=>array('canvasjs.min.js'),
                )
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(

	),
);