<?php
// $Id$


/**
 * Emulate environment magic_quotes_gpc=off
 *
 * @category    PHP
 * @package     PHP_Compat
 * @license     LGPL - http://www.gnu.org/licenses/lgpl.html
 * @copyright   2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
 * @link        http://php.net/magic_quotes
 * @author      Arpad Ray <arpad@php.net>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */

// wrap everything in a function to keep global scope clean
function php_compat_magic_quotes_gpc_off()
{
    require_once 'PHP/Compat/Environment/_magic_quotes_inputs.php';
    
    $mqOn = get_magic_quotes_gpc();
    if ($mqOn && !ini_get('magic_quotes_sybase') || !$phpLt50 && $phpLt51) {
        $inputCount = count($inputs);
        while (list($k, $v) = each($inputs)) {
            $order1 = $k < $inputCount;
            foreach ($v as $var => $value) {
                $isArray = is_array($value);
                $stripKeys = $mqOn
                     ? ($isArray
                        ? !$phpLt522 || !$order1
                        : ($order1 ? !$phpLt50 : !$phpLt434))
                     : !$phpLt50 && $phpLt51 && !$isArray;
                if ($stripKeys) {
                    $tvar = stripslashes($var);
                    if ($var != $tvar) {
                        $tvalue = $inputs[$k][$var];
                        $inputs[$k][$tvar] = $tvalue;
                        unset($inputs[$k][$var]);
                        $var = $tvar;
                    }
                }
                if (is_array($value)) {
                    $inputs[] = &$inputs[$k][$var];
                } else {
                    $inputs[$k][$var] = $mqOn ? stripslashes($value) : $value;
                }
            }
        }
    }

    // Register the change
    ini_set('magic_quotes_gpc', 'off');
}
php_compat_magic_quotes_gpc_off();

