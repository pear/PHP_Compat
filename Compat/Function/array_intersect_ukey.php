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
 * Replace array_intersect_ukey()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/array_intersect_ukey
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5.1.0
 * @require     PHP 4.0.1 (trigger_error)
 */
if (!function_exists('array_intersect_ukey')) {
    function array_intersect_ukey()
    {

    }
}

?>