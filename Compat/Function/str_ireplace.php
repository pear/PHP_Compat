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
 * Replace str_ireplace()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.str_ireplace
 * @author      Aidan Lister <aidan@php.net>
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 * @since       PHP 5
 * @require     PHP 4.0.0 (user_error)
 * @note        count is returned by reference (required parameter)
 *              to disable, change '&$count' to '$count = null'
 */
function php_compat_str_ireplace($search, $replace, $subject, &$count)
{
    // Sanity check
    if (is_string($search) && is_array($replace)) {
        user_error('Array to string conversion', E_USER_NOTICE);
        $replace = (string) $replace;
    }

    // If search isn't an array, make it one
    if (!is_array($search)) {
        $search = array ($search);
    }
    $search = array_values($search);

    // If replace isn't an array, make it one, and pad it to the length of search
    if (!is_array($replace)) {
        $replace_string = $replace;

        $replace = array ();
        for ($i = 0, $c = count($search); $i < $c; $i++) {
            $replace[$i] = $replace_string;
        }
    }
    $replace = array_values($replace);

    // Check the replace array is padded to the correct length
    $length_replace = count($replace);
    $length_search = count($search);
    if ($length_replace < $length_search) {
        for ($i = $length_replace; $i < $length_search; $i++) {
            $replace[$i] = '';
        }
    }

    // If subject is not an array, make it one
    $was_array = false;
    if (!is_array($subject)) {
        $was_array = true;
        $subject = array ($subject);
    }

    // Prepare the search array
    foreach ($search as $search_key => $search_value) {
        $search[$search_key] = '/' . preg_quote($search_value, '/') . '/i';
    }
    
    // Prepare the replace array (escape backreferences)
    foreach ($replace as $k => $v) {   
        $replace[$k] = str_replace(array(chr(92), '$'), array(chr(92) . chr(92), '\$'), $v);
    }

    // do the replacement
    $result = preg_replace($search, $replace, $subject, -1, $count);

    // Check if subject was initially a string and return it as a string
    if ($was_array === true) {
        return $result[0];
    }

    // Otherwise, just return the array
    return $result;
}


// Define
if (!function_exists('str_ireplace')) {
    function str_ireplace($search, $replace, $subject, $count = null)
    {
        return php_compat_str_ireplace($search, $replace, $subject, $count);
    }
}
