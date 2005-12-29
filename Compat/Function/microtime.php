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
// |          Arpad Ray <arpad@php.net>                                   |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace microtime()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.microtime
 * @author      Aidan Lister <aidan@php.net>
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.0 (Added optional get_as_float parameter)
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_microtime($get_as_float = false)
{
    if (!function_exists('gettimeofday')) {
        $time = time();
        return $get_as_float ? ($time * 1000000.0) : '0.00000000 ' . $time;
    } 
    $gtod = gettimeofday();
    $usec = $gtod['usec'] / 1000000.0;
    return $get_as_float
        ? (float) ($gtod['sec'] + $usec)
        : (sprintf('%.8f ', $usec) . $gtod['sec']);
}


// Define
if (!function_exists('microtime')) {
    function microtime($get_as_float = false)
    { 
        return php_compat_microtime($get_as_float);
    }
}
