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
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
//////////////////////////////////////////////////////增加
                array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'trace',//提示的级别
                    'categories'=>'system.db.*',
                   // 'categories'=>'system.*',
//还可以通过 'showInFireBug'=>true, //显示在Firebug里
//显示在Firebug里我们就可以调整提示级别，来显示更多
//例如'levels'=>'trace,info,error,warning,xdebug',
                ),
//////////////////////////////////////////////////////
            ),
        ),
        'mail'=>array(

            'class'=>'ext.PHPMailer.phpmailer',
            'CharSet' => 'utf-8', // 您的企业邮局域名
            'Host' => 'smtp.yeah.net', // 您的企业邮局域名
            'SMTPAuth' => true, // 启用SMTP验证功能
            'Username' => 'thisadmin@yeah.net', // 邮局用户名(请填写完整的email地址)
            'Password' => 'gs67H454', // 邮局密码
            'Port'=>25,
            'From' => 'thisadmin@yeah.net', //邮件发送者email地址
            'FromName' => 'admin',

        ),

    ),

	// 可访问的应用程序级别参数
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);