<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3 of the PHP license,         |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://au.php.net/license/3_0.txt.                                   |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Aidan Lister <aidan@php.net>                                 |
// +----------------------------------------------------------------------+
//
// $Id$
//


/**
 * Replace array_combine()
 *
 * PHP 5
 * 
 * http://php.net/function.array_combine
 *
 * @author        Aidan Lister <aidan@virtualexplorer.com.au>
 * @version       1.0
 */
if (!function_exists('array_combine'))
{
    function array_combine(&$keys, &$values)
    {
		if (!is_array($keys)) {
			trigger_error('array_combine() expects parameter 1 to be array, string given', E_USER_WARNING);
			return null;
		}

		if (!is_array($values)) {
			trigger_error('array_combine() expects parameter 2 to be array, string given', E_USER_WARNING);
			return null;
		}

        if (count($keys) !== count($values)) {
            trigger_error('array_combine() Both parameters should have equal number of elements', E_USER_WARNING);
            return false;
        }

        if (count($keys) === 0 || count($values) === 0) {
            trigger_error('array_combine() Both parameters should have number of elements at least 0', E_USER_WARNING);
            return false;
        }

        $keys    = array_values($keys);
        $values  = array_values($values);

        $combined = array ();

        for ($i = 0, $cnt = count($values); $i < $cnt; $i++) {
            $combined[$keys[$i]] = $values[$i];
        }

        return $combined;
    }
}

?>