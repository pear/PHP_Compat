<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
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
// | Authors: Stephan Schmidt <schst@php.net>                             |
// +----------------------------------------------------------------------+
//
// $Id$
//

/**
 * Replace array_change_key_case()
 *
 * Added in PHP 4.2
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_change_key_case
 * @author      Stephan Schmidt <schst@php.net>
 * @version     1.0
 */
 
if( !defined('CASE_LOWER') ) {
    define('CASE_LOWER', 0);
}
if( !defined('CASE_UPPER') ) {
    define('CASE_UPPER', 1);
}

if (!function_exists('array_change_key_case'))
{
    function array_change_key_case($input, $case = CASE_LOWER)
    {
        if (!is_array($input)) {
            trigger_error('array_change_key_case(): The argument should be an array', E_USER_WARNING);
            return false;
        }
        
        $output = array();
        $keys   = array_keys($input);
        foreach ($keys as $key) {
            $newKey = $case == CASE_UPPER ? strtoupper($key) : strtolower($key);
            $output[$newKey] = &$input[$key];
        }
        return $output;
    }
}
?>