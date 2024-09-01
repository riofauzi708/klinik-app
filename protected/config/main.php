<?php

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Klinik App',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'your_password_here',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

    // application components
    'components'=>array(
        'db'=>array(
			'connectionString' => 'pgsql:host=localhost;dbname=klinik_db',
			'username' => 'postgres',
			'password' => 'root',
			'charset' => 'utf8',
		),
        'authManager' => array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
        ),
        'user'=>array(
            'class'=>'CWebUser',
            'allowAutoLogin'=>true,
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        'adminEmail'=>'webmaster@example.com',
    ),
);
