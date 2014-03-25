<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Blog Demo',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
           'application.modules.user.components.*',
           'application.modules.rights.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',

    ),

	'defaultController'=>'post',

	// application components
	'components'=>array(
        /*
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
        */
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=blog',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => '',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'urlManager'=>array(
            'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'class' => 'RWebUser',
            'loginUrl' => array('/user/login'),
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
				),*/
			),
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'defaultRoles' => array('Guest'),
        ),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
    ),


	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),

    'modules'=>array(

        'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => false,
            # allow access for non-activated users
            'loginNotActiv' => true,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),

        'user',

        'rights',
        /*    'install'=>false,
                'userNameColumn'=>'username',
                'userClass'=>'Users',
                'superuserName'=>'admin'
        ),*/

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123',
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),

        ),

        'hybridauth' => array(
            'baseUrl' => 'http://'. $_SERVER['SERVER_NAME'] . '/hybridauth',
            'withYiiUser' => true, // Set to true if using yii-user
            "providers" => array (
                "openid" => array (
                    "enabled" => true
                ),

                "facebook" => array (
                    "enabled" => true,
                    "keys"    => array ( "id" => "", "secret" => "" ),
                    "scope"   => "email,publish_stream",
                    "display" => ""
                ),

                "twitter" => array (
                    "enabled" => true,
                    "keys"    => array ( "key" => "", "secret" => "" )
                )
            )
        ),

    ));