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
// | Authors: Arpad Ray <arpad@php.net>                                   |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Emulate enviroment magic_quotes_gpc=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/magic_quotes
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 */
if (get_magic_quotes_gpc()) {
    // Recursive addslashes function
    function php_compat_addslashesr($value, $keybug)
    {
        if (!is_array($value)) {
            return addslashes($value);
        }
        $result = array();
        foreach ($value as $k => $v) {
            $result[$keybug ? $k : addslashes($k)] = php_compat_addslashesr($v, $keybug);
        }
        return $result;
    }

    // between 5.0.0 and 5.1.0, array keys in the superglobals were escaped even with register_globals off
    $keybug = (version_compare(PHP_VERSION, '5.0.0', '>=') && version_compare(PHP_VERSION, '5.1.0', '<'));

    $inputs = array(&$_POST, &$_GET, &$_COOKIE);
    foreach ($inputs as $input) {
        $inputs[$k] = array_map('php_compat_addslashesr', $v, $keybug);
    }

    // Register the change
    ini_set('magic_quotes_gpc', 'on');
}
