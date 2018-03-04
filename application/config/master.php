<?php
/**
 * Configuration file for master branch/production.
 * 
 * @author theKindlyMallard <the.kindly.mallard@gmail.com>
 */

/**
 * Configuration for: Error reporting
 * Do not display any errors but log them in specified file.
 */
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', DIR_LOGS . 'error.log');

/**
 * Configuration for: Project URL
 */
define('APPLICATION_URL', 'http://example.com');

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
define('DB_NAME', 'database-name');
/**
 * @var string Database user name.
 */
define('DB_USER', 'database-user');
/**
 * @var string Database user pasword.
 */
define('DB_PASS', 'okoń');
