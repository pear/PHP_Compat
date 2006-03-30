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
 * @link        http://php.net/magic_quotes
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */
if (get_magic_quotes_gpc() && !ini_get('magic_quotes_sybase')) {
    // Recursive stripslashes function
    function php_compat_mqgpc_unescape($value, $keybug)
    {
        if (!is_array($value)) {
            return stripslashes($value);
        }
        foreach ($value as $k => $v) {
            $k = $keybug ? $k : stripslashes($k);
            $value[$k] = php_compat_mqgpc_unescape($v, $keybug);
        }
        return $value;
    }

    // between 5.0.0 and 5.1.0, array keys in the superglobals were escaped even with register_globals off
    $keybug = (version_compare(PHP_VERSION, '5.0.0', '>=') && version_compare(PHP_VERSION, '5.1.0', '<'));

    $inputs = array(&$_POST, &$_GET, &$_COOKIE);

    foreach ($inputs as $k => $input) {
        $inputs[$k] = php_compat_mqgpc_unescape($input, $keybug);
    }

    // Register the change
    ini_set('magic_quotes_gpc', 'off');
}
