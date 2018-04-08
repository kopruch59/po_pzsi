<?php
/**
 * theKindlyMallard user configuration file.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
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
/**
 * @var string Application main URL.
 */
define('APPLICATION_URL', 'http://vvposchedule/');
/**
 * @var string Application URL with IP address.
 */
define('APPLICATION_URL_IP', 'http://127.0.0.69/');

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
define('DB_NAME', 'po_pzsi_student-schedule');
/**
 * @var string Database user name.
 */
define('DB_USER', 'po_pzsi');
/**
 * @var string Database user pasword.
 */
define('DB_PASS', 'qwerty');
