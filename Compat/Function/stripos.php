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
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$
//

/**
 * Replace stripos()
 *
 * Added in PHP 5
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.stripos
 * @author      Stephan Schmidt <schst@php.net>
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 */
if (!function_exists('stripos'))
{
   /**
    * Find position of first occurrence of a case-insensitive string
    *
    * @param    string           haystack
    * @param    string           needle
    * @param    integer          offset
    * @return   integer|boolean  position or false
    */
	function stripos($haystack, $needle, $offset = null) {

        if (!is_scalar($haystack)) {
            trigger_error('stripos() expects parameter 1 to be string, '.gettype($haystack).' given', E_USER_WARNING);
            return null;
        }

        if (!is_scalar($needle)) {
            trigger_error('stripos(): needle is not a string or an integer.', E_USER_WARNING);
            return null;
        }

        return strpos(strtolower($haystack), strtolower($needle), $offset);
    }
}
?>