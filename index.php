<?php
/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */
// load application config (error reporting etc.)
//require 'application/config/config.php';
// load application class
require './application/application.php';
require './application/controller/controller.php';
// start the application
$app = new Application();
