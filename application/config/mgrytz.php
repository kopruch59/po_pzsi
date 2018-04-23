<?php
/**
 * mgrytz user configuration file.
 * 
 * @author mgrytz <m_grytz@wp.pl>
 */

/**
 * Configuration for: Error reporting
 * For testing environment display all errors.
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Configuration for: Project URL
 */
define('APPLICATION_URL', 'http://projekt-zespolowy');
/**
 * @var string Application URL with IP address.
 */
define('APPLICATION_URL_IP', 'http://127.0.0.1/');

/**
 * Configuration for: Database
 */
/**
 * @var string Type of database. Probably should by always mysql.
 */
define('DB_TYPE', 'mysql');
/**
 * @var string Database URL or localhost if local hosted.
 */
define('DB_HOST', 'localhost');
/**
 * @var string Database name to connect.
 */
define('DB_NAME', 'projekt-pon');
/**
 * @var string Database user name.
 */
define('DB_USER', 'root');
/**
 * @var string Database user pasword.
 */
define('DB_PASS', '');
