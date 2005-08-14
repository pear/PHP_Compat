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
 * Replace var_export()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.var_export
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.2.0
 * @require     PHP 4.0.0 (user_error)
 */
if (!function_exists('var_export')) {
    function var_export($array, $return = false)
    {
        // Init
        $indent      = '  ';
        $doublearrow = ' => ';
        $lineend     = ",\n";
        $stringdelim = '\'';
        $newline     = "\n";
        $find        = array(null, '\\', '\'');
        $replace     = array('NULL', '\\\\', '\\\'');

        switch (is_array($array)) {
            // Array
            case true:
                // Begin the array export
                // Start the string
                $out = "array (\n";

                // Loop through each value in array
                foreach ($array as $key => $value) {
                    // Key
                    if (is_string($key)) {
                        for ($i = 0, $c = count($find); $i < $c; $i++) {
                            $array = str_replace($find[$i], $replace[$i], $array);
                        }
                        $out = $stringdelim . $array . $stringdelim;
                    }
                    
                    // Value
                    if (is_array($value)) {
                        // Do some recursion while increasing indent
                        $recur_array = explode($newline, var_export($value, true));
                        $temp_array = array();
                        foreach ($recur_array as $recur_line) {
                            $temp_array[] = $indent . $recur_line;
                        }
                        $recur_array = implode($newline, $temp_array);
                        $value = $newline . $recur_array;
                    } else {
                        $value = var_export($value, true);
                    }

                    // Piece line together
                    $out .= $indent . $key . $doublearrow . $value . $lineend;
                }

                // End string
                $out .= ")";
                break;

            // Primitive type
            case false:
                if (is_string($array)) {
                    for ($i = 0, $c = count($find); $i < $c; $i++) {
                        $array = str_replace($find[$i], $replace[$i], $array);
                    }
                    $out = $stringdelim . $array . $stringdelim;
                } elseif (is_int($array) || is_float($array)) {
                    $out = (string) $array;
                } elseif (is_bool($array)) {
                    $out = $array ? 'true' : 'false';
                } elseif (is_null($array) || is_resource($array)) {
                    $out = 'NULL';
                } else {
                    $out = '* ERROR *';
                }
                break;
        }

        // Method of output
        if ($return === true) {
            return $out;
        } else {
            echo $out;
            return;
        }
    }
}

?>