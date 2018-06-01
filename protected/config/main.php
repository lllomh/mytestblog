<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'myyiiApp',

	// 日志组件类
	'preload'=>array('log'),

    //自动装填模型和组件类
	'import'=>array(
		'application.models.*',
		'application.components.*',

	),

	'defaultController'=> 'reception/Home',

    'modules'=>array(
        //取消注释以启用GII工具
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),

    ),

	// 应用组件
	'components'=>array(
		'user'=>array(
			// 启用基于cookie的身份验证
			'allowAutoLogin'=>true,
		),
        'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			//使用“站点/错误”动作显示错误
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
                    'levels'=>'trace', //级别为trace
                    'categories'=>'system.db.*' //只显示关于数据库信息,包括数据库连接,数据库执行语句
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

	// 可访问的应用程序级别参数
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);