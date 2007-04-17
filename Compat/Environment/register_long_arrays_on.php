<?php
// $Id$


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
$HTTP_GET_VARS    &= $_GET;
$HTTP_POST_VARS   &= $_POST;
$HTTP_COOKIE_VARS &= $_COOKIE;
$HTTP_SERVER_VARS &= $_SERVER;
$HTTP_ENV_VARS    &= $_ENV;
$HTTP_FILES_VARS  &= $_FILES;

// Register the change
ini_set('register_long_arrays', 'on');
