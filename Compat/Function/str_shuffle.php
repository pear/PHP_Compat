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
 * Replace str_shuffle()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.str_shuffle
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.3.0
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_str_shuffle($str)
{
    // Cast
    $str = (string) $str;
    
    // Swap random character from [0..$i] to position [$i].
    for ($i = strlen($str) - 1; $i >= 0; $i--) {  
        $j = mt_rand(0, $i);
        $tmp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $tmp;
    }
    
    return $str;
}


// Define
if (!function_exists('str_shuffle')) {
    function str_shuffle($str)
    {
        return php_compat_str_shuffle($str);
    }
}
