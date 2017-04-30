<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The Game of values market',
	'language'=>'uk',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.yiichat.*',
		'application.extensions.curl.Curl',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'wm'=>array(
            'orderClass'=>'Operations',//Модель заказа
            'orderIdField'=>'id',//Id поле
            'orderSumField'=>'amount',//поле стоимости
            'orderSuccessFunction'=>'setSuccess',//функция модели при успешном платеже
            'orderSuccesUrl'=>'http://games-market.esy.es/diplom/operations/success',//url успешного платежа (вообще-то бессмысленная вещь)
            'orderFailUrl'=>'http://games-market.esy.es/diplom/operations/fail',//url ошибочного платежа (вообще-то бессмысленная вещь)
            'orderMessage'=>'The Game Values paiyng',//сообщение, которое будет выводиться пользователю при оплате (цель платежа), возможно использование "{$orderId}" в теле для вывода № заказа
            'csrfToken'=>false,//передавать или нет csrfToken
        ),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false, 
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'format'=>array(
			'class'=>'CFormatter',
			'datetimeFormat'=>'d.m.y h:i:s',
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
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'descr'=>'Магазин ігрових цінностей',
	),
);
