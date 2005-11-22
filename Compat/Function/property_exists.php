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
// | Authors: Christian Stadler <webmaster@ragnarokonline.de>             |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace property_exists()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/property_exists
 * @author      Christian Stadler <webmaster@ragnarokonline.de>
 * @version     $Revision$
 * @since       PHP 5.1.0
 * @require     PHP 4.0.0 (user_error)
 */
if (!function_exists('property_exists')) {
    function property_exists($class, $property)
    {
        if (!is_string($property)) {
            user_error('property_exists() expects parameter 2 to be a string, ' .
                gettype($property) . ' given', E_USER_WARNING);
            return false;
        }

        if (is_object($class) || is_string($class)) {
            if (is_string($class)) {
                if (!class_exists($class)) {
                    return false;
                }

                $vars = get_class_vars($class);
            } else {
                $vars = get_object_vars($class);
            }

            // Bail out early if get_class_vars or get_object_vars didnt work
            // or returned an empty array           
            if (!is_array($vars) || count($vars) <= 0) {
                return false;
            }

            $property = strtolower($property);
            foreach (array_keys($vars) AS $varname) {
                if (strtolower($varname) == $property) {
                    return true;
                }
            }
                    
            return false;
        }

        user_error('property_exists() expects parameter 1 to be a string or ' .
            'an object, ' . gettype($class) . ' given', E_USER_WARNING);
        return false;
    }
}

?>