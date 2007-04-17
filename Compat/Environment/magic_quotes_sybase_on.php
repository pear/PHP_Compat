<?php
// $Id$


/**
 * Emulate enviroment magic_quotes_sybase=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @license     LGPL - http://www.gnu.org/licenses/lgpl.html
 * @copyright   2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
 * @link        http://php.net/manual/en/ref.sybase.php#ini.magic-quotes-sybase
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 */
if (!ini_get('magic_quotes_sybase')) {
    // Recursive stripslashes function
    function php_compat_sybase_mqgpc_unescape($value, $keybug)
    {
        if (!is_array($value)) {
            return stripslashes($value);
        }
        foreach ($value as $k => $v) {
            $k = $keybug ? $k : stripslashes($k);
            $value[$k] = php_compat_sybase_mqgpc_unescape($v, $keybug);
        }
        return $value;
    }
    // Recursively replace ' with ''
    function php_compat_sybase_escape($value)
    {
        if (!is_array($value)) {
            return str_replace('\'', '\'\'', $value);
        }
        foreach ($value as $k => $v) {
            $k = str_replace('\'', '\'\'', $k);
            $value[$k] = php_compat_sybase_escape($v);
        }
    }    

    // between 5.0.0 and 5.1.0, array keys in the superglobals were escaped even with magic_quotes_gpc off
    $keybug = (version_compare(PHP_VERSION, '5.0.0', '>=') && version_compare(PHP_VERSION, '5.1.0', '<'));

    $inputs = array(&$_POST, &$_GET, &$_COOKIE);
    
    if (ini_get('magic_quotes_gpc')) {
        foreach ($inputs as $k => $input) {
            $inputs[$k] = php_compat_sybase_mqgpc_unescape($input, $keybug);
        }
    }
    $inputs = array_map('php_compat_sybase_escape', $inputs);
    
    // Register the change
    ini_set('magic_quotes_sybase', 'on');
}
