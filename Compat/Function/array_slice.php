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
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace array_slice()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_slice
 * @author      Arpad Ray <arpad@php.net>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.2 (Added optional preserve keys parameter)
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_array_slice($array, $offset, $length = null, $preserve_keys = false)
{ 
    if (!$preserve_keys) {
        return array_slice($array, $offset, $length);
    }
    if (!is_array($array)) {
        user_error('The first argument should be an array', E_USER_WARNING);
        return;
    }
    $keys = array_slice(array_keys($array), $offset, $length);
    $ret = array();
    foreach ($keys as $key) {
        $ret[$key] = $array[$key];
    }
    return $ret;
}


// Define
if (!function_exists('array_slice')) {
    function array_slice($array, $offset, $length = null, $preserve_keys = false)
    { 
        return php_compat_array_slice($array, $offset, $length, $preserve_keys);
    }
}

?>