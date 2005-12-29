<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Emulate enviroment magic_quotes_gpc=off
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/magic_qutoes
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */
if (get_magic_quotes_gpc()) {
    // Recursive stripslashes function
    function php_compat_stripslashesr($value)
    {
        $value = is_array($value) ?
                    array_map('php_compat_stripslashesr', $value) :
                    stripslashes($value);

        return $value;
    }

    $_POST = array_map('php_compat_stripslashesr', $_POST);
    $_GET = array_map('php_compat_stripslashesr', $_GET);
    $_COOKIE = array_map('php_compat_stripslashesr', $_COOKIE);

    // Register the change
    ini_set('magic_quotes_gpc', 'off');
}
