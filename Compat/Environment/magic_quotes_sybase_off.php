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
 * Emulate enviroment magic_quotes_sybase=off
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/manual/en/ref.sybase.php#ini.magic-quotes-sybase
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 */
if (ini_get('magic_quotes_sybase')) {
    // Recursive addslashes function
    function php_compat_sybase_mqgpc_escape($value, $keybug)
    {
        if (!is_array($value)) {
            return addslashes($value);
        }
        foreach ($value as $k => $v) {
            $k = $keybug ? $k : addslashes($k);
            $value[$k] = php_compat_sybase_mqgpc_escape($v, $keybug);
        }
        return $value;
    }
    // Recursively replace '' with '
    function php_compat_sybase_unescape($value)
    {
        if (!is_array($value)) {
            return str_replace('\'\'', '\'', $value);
        }
        foreach ($value as $k => $v) {
            $k = str_replace('\'\'', '\'', $k);
            $value[$k] = php_compat_sybase_unescape($v);
        }
    }    

    // between 5.0.0 and 5.1.0, array keys in the superglobals were escaped even with magic_quotes_gpc off
    $keybug = (version_compare(PHP_VERSION, '5.0.0', '>=') && version_compare(PHP_VERSION, '5.1.0', '<'));

    $inputs = array(&$_POST, &$_GET, &$_COOKIE);
    
    if (ini_get('magic_quotes_gpc')) {
        foreach ($inputs as $k => $input) {
            $inputs[$k] = php_compat_sybase_mqgpc_escape($input, $keybug);
        }
    }
    $inputs = array_map('php_compat_sybase_unescape', $inputs);
    
    // Register the change
    ini_set('magic_quotes_sybase', 'on');
}
