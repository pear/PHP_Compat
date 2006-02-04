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
 * Replace mkdir()
 *
 * Stream contexts aren't supported prior to PHP 5, reverts
 * to native function (to support contexts) in PHP 5+.
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.mkdir
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.0 (Added optional recursive and context parameters)
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_mkdir($pathname, $mode = 0777, $recursive = true, $context = null) {
    if (version_compare(PHP_VERSION, '5.0.0', 'gte')) {
        // revert to native function
        return (func_num_args() > 3)
            ? mkdir($pathname, $mode, $recursive, $context)
            : mkdir($pathname, $mode, $recursive);
    }
    if (!strlen($pathname)) {
        user_error('No such file or directory', E_USER_WARNING);
        return false;
    }
    if (is_dir($pathname)) {
        if (func_num_args() == 5) {
            // recursive call
            return true;
        }
        user_error('File exists', E_USER_WARNING);
        return false;
    }
    $parent_is_dir = php_compat_mkdir(dirname($pathname), $mode, $recursive, null, 0);
    if ($parent_is_dir) {
        return mkdir($pathname, $mode);
    }
    user_error('No such file or directory', E_USER_WARNING);
    return false;
}


// Define
if (!function_exists('mkdir')) {
    function mkdir($pathname, $mode, $recursive = false, $context = null)
    { 
        return php_compat_mkdir($pathname, $mode, $recursive, $context);
    }
}

?>