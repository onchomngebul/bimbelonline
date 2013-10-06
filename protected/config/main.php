<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('chartjs', dirname(__FILE__) . '/../extensions/yii-chartjs');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Manage Bimbingan Belajar Online',
    // preloading 'log' component
    'preload' => array('log'),
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // buat yiistrap
    ),
    // autoloading model and component classes
    'import' => array(
        'bootstrap.helpers.TbHtml',
        'application.models.*',
        'application.components.*',
        'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Loader',
    ),
    'modules' => array(
        'ManageSoal' => array(),
        'ManageUser' => array(),
        'ManageUjian' => array(),
        'ManagePembayaran' => array(),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234qwer',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),
   // 'theme'=>'bootstrap',
    'defaultController' => 'Site',
    // application components
    'components' => array(
        'user' => array(
            // There you go, use our 'extended' version
            'class'=>'application.components.EWebUser',
            // enable cookie-based authentication            
            'allowAutoLogin' => true,
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=bimbel',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'buchori_wahyu@yahoo.com',
    ),
        //import' => array( 'Ext.yii-mail.*',)
        //nyoba send email
);