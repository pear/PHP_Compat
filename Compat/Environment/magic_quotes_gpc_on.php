<?php
// $Id$


/**
 * Emulate environment magic_quotes_gpc=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @license     LGPL - http://www.gnu.org/licenses/lgpl.html
 * @copyright   2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
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

