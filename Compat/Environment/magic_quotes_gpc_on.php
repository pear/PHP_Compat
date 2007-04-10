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
// | Authors: Arpad Ray <arpad@php.net>                                   |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Emulate environment magic_quotes_gpc=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/magic_quotes
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 */

// wrap everything in a function to keep global scope clean
function php_compat_magic_quotes_gpc_on()
{
    require_once 'PHP/Compat/Environment/_magic_quotes_inputs.php';
    
    $mqOn = get_magic_quotes_gpc();
    if ($phpLt522 || !$mqOn && !ini_get('magic_quotes_sybase')) {
        $inputCount = count($inputs);
        while (list($k, $v) = each($inputs)) {
            foreach ($v as $var => $value) {
                $isArray = is_array($value);
                $order1 = $k < $inputCount;
                if ($phpLt50 
                     ? ($order1 || (!$isArray && $phpLt434))
                     : $order1 && $isArray) {
                    $tvar = addslashes($var);
                    if ($var != $tvar) {
                        $tvalue = $inputs[$k][$var];
                        $inputs[$k][$tvar] = $tvalue;
                        unset($inputs[$k][$var]);
                        $var = $tvar;
                    }
                }
                if ($isArray) {
                    $inputs[] = &$inputs[$k][$var];
                } else {
                    $inputs[$k][$var] = $mqOn ? $value : addslashes($value);
                }
            }
        }
    
        // Register the change
        ini_set('magic_quotes_gpc', 'on');
    }       
}
php_compat_magic_quotes_gpc_on();

