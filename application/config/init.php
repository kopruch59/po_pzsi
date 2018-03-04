<?php
/**
 * Initializes basic and users configuration aspects.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */

/**
 * @var string Absolute path to application directory.
 */
define('DIR_APPLICATION', DIR_ROOT . 'application' . DS);
/**
 * @var string Absolute path to controllers main directory.
 */
define('DIR_CONTROLLER', DIR_APPLICATION . 'controller' . DS);
/**
 * @var string Absolute path to logs directory.
 */
define('DIR_LOGS', DIR_APPLICATION . 'logs' . DS);
/**
 * @var string Absolute path to models main directory.
 */
define('DIR_MODEL', DIR_APPLICATION . 'model' . DS);
/**
 * @var string Absolute path to public directory.
 */
define('DIR_PUBLIC', DIR_ROOT . 'public' . DS);
/**
 * @var string Absolute path to views main directory.
 */
define('DIR_VIEW', DIR_APPLICATION . 'view' . DS);

//Load environment configuration depend on SetEnv property set in vhost configuration.
switch (getenv('APPLICATION_ENV')) {
    case 'master':
        require 'master.php';
    break;
    case 'theKindlyMallard':
        require 'theKindlyMallard.php';
    break;
    case 'tkusiek':
        require 'tkusiek.php';
            
    break;
    case 'skomando':
        require 'skomando.php';        
    break;
    default:
        //No environment set or environment not known. Do not do anything else.
        die('Cannot continue - invalid environment. Please contact administrator.');
    break;
}

/**
 * Load necessary classes.
 */
require_once DIR_APPLICATION . 'application.php';
require_once DIR_CONTROLLER . 'controller.php';
require_once DIR_MODEL . 'model.php';
