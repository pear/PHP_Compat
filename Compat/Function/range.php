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
 * Replace range()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.range
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.0 (The optional step parameter was added in 5.0.0)
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_range($low, $high, $step = 1)
{ 
    $arr = array();
    $step = (abs($step) > 0) ? abs($step) : 1;
    $sign = ($low <= $high) ? 1 : -1;

    // Numeric sequence
    if (is_numeric($low) && is_numeric($high)) {
        for ($i = (float)$low; $i*$sign <= $high*$sign; $i += $step*$sign)
        $arr[] = $i;
    
    // Character sequence
    } else {
        if (is_numeric($low)) {
            return $this->range($low, 0, $step);
        }

        if (is_numeric($high)) {
            return $this->range(0, $high, $step);
        }

        $low = ord($low);
        $high = ord($high);
        for ($i = $low; $i * $sign <= $high * $sign; $i += $step * $sign) {
            $arr[] = chr($i);
        }
    }

    return $arr; 
}


// Define
if (!function_exists('range')) {
    function range($low, $high, $step = 1)
    { 
        return php_compat_range($low, $high, $step);
    }
}
