<?php
/**
 * Emulate enviroment register_long_arrays=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @license     LGPL - http://www.gnu.org/licenses/lgpl.html
 * @copyright   2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
 * @link        http://php.net/manual/en/ini.core.php#ini.register-long-arrays
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */
$GLOBALS['HTTP_GET_VARS']    = &$_GET;
$GLOBALS['HTTP_POST_VARS']   = &$_POST;
$GLOBALS['HTTP_COOKIE_VARS'] = &$_COOKIE;
$GLOBALS['HTTP_SERVER_VARS'] = &$_SERVER;
$GLOBALS['HTTP_ENV_VARS']    = &$_ENV;
$GLOBALS['HTTP_FILES_VARS']  = &$_FILES;

// Register the change
ini_set('register_long_arrays', 'on');
