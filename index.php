<?php

//Duong dan den thu muc chua ung dung
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH', 
			  realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'production'));
			  
//Nap duong dan den cac thu vien se su dung trong ung dung
set_include_path(
APPLICATION_PATH.'/../library'.PATH_SEPARATOR.
APPLICATION_PATH.'/../library/Zend'
);





/** Zend_Application */

require_once 'Zend/Application.php';
require_once 'ham/ham.php';
require_once 'ham/library/HTMLPurifier.auto.php';


// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
