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
 * Replace array_uintersect_uassoc()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_uintersect_uassoc
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5
 * @require     PHP 4.0.6 (is_callable)
 */
if (!function_exists('array_uintersect_uassoc'))
{
    function array_uintersect_uassoc()
    {
        $args = func_get_args();
        if (count($args) < 4) {
            trigger_error('Wrong parameter count for array_uintersect_uassoc()', E_USER_WARNING);
            return;
        }

        // Get key_compare_func
        $key_compare_func = array_pop($args);
        if (!is_callable($key_compare_func)) {
            if (is_array($key_compare_func)) {
                $key_compare_func = $key_compare_func[0] . '::' . $key_compare_func[1];
            }
            trigger_error('array_uintersect_uassoc() Not a valid callback ' . $key_compare_func, E_USER_WARNING);
            return;
        }

        // Get data_compare_func
        $data_compare_func = array_pop($args);
        if (!is_callable($data_compare_func)) {
            if (is_array($data_compare_func)) {
                $data_compare_func = $data_compare_func[0] . '::' . $data_compare_func[1];
            }
            trigger_error('array_uintersect_uassoc() Not a valid callback ' . $data_compare_func, E_USER_WARNING);
            return;
        }

        // Check arrays
        $count = count($args);
        for ($i = 0; $i !== $count; $i++) {
            if (!is_array($args[$i])) {
                trigger_error('array_uintersect_uassoc() Argument #' . ($i + 1) . ' is not an array', E_USER_WARNING);
                return;
            }
        }

        // Traverse values of the first array
        $intersect = array ();
        foreach ($args[0] as $key => $value) {
            // Check all arrays
            for ($i = 1; $i < $count; $i++) {
                if (!array_key_exists($key, $args[$i])) {
                    continue;
                }
                $result = call_user_func($key_compare_func, $value, $args[$i][$key]);
                if ($result === 0) {
                    $intersect[$key] = $value;
                    continue;
                }
            }
        }

        return $intersect;
    }
}

?>