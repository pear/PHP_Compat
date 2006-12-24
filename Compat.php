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
 * Provides missing functionality in the form of constants and functions
 *   for older versions of PHP
 *
 * Optionally, you may simply include the file.
 *   e.g. require_once 'PHP/Compat/Function/scandir.php';
 *
 * @category    PHP
 * @package     PHP_Compat
 * @version     $Revision$
 * @author      Aidan Lister <aidan@php.net>
 * @static
 */
class PHP_Compat
{
    /**
     * Load a function, or array of functions
     *
     * @param   string|array    $function   The function or functions to load
     * @return  bool|array      TRUE if loaded, FALSE if not
     */
    function loadFunction($function)
    {
        // Multiple
        if (is_array($function)) {
            $res = array();
            foreach ($function as $singlefunc) {
                $res[$singlefunc] = PHP_Compat::loadFunction($singlefunc);
            }

            return $res;
        }

        // Check for packages which can modify the function table at runtime
        $symbolfuncs = array('rename_function', 'runkit_rename_function');
        foreach ($symbolfuncs as $symbolfunc) {
            $renamedfunction = 'php_compat_renamed' . $function;
            if (function_exists($symbolfunc) &&
                function_exists($function) &&
                !function_exists($renamedfunction)) {
                    
                // Rename the core function
                rename_function($function, $renamedfunction);
                break;
        }

        // Single
        if (!function_exists($function)) {
            $file = sprintf('PHP/Compat/Function/%s.php', $function);
            if ((@include_once $file) !== false) {
                return true;
            }
        }

        return false;
    }


    /**
     * Load a constant, or array of constants
     *
     * @param   string|array    $constant   The constant or constants to load
     * @return  bool|array      TRUE if loaded, FALSE if not
     */
    function loadConstant($constant)
    {
        // Multiple
        if (is_array($constant)) {
            $res = array();
            foreach ($constant as $singleconst) {
                $res[$singleconst] = PHP_Compat::loadConstant($singleconst);
            }

            return $res;
        }

        // Single
        $file = sprintf('PHP/Compat/Constant/%s.php', $constant);
        if ((@include_once $file) !== false) {
            return true;
        }

        return false;
    }


    /**
     * Load an environment
     *
     * @param   string          $environment   The environment to load
     * @param   string          $setting       Turn the environment on or off
     * @return  bool            TRUE if loaded, FALSE if not
     */
    function loadEnvironment($environment, $setting)
    {
        // Load environment
        $file = sprintf('PHP/Compat/Environment/%s_%s.php', $environment, $setting);
        if ((@include_once $file) !== false) {
            return true;
        }

        return false;
    }


    /**
     * Load components for a PHP version
     *
     * @param   string      $version        PHP Version to load
     * @return  array       An associative array of component names loaded
     */
    function loadVersion($version = null)
    {
        // Include list of components
        require 'PHP/Compat/Components.php';

        // Include version_compare to work with older versions
        PHP_Compat::loadFunction('version_compare');

        // Init
        $phpversion = phpversion();
        $methods = array(
            'function' => 'loadFunction',
            'constant' => 'loadConstant');
        $res = array();

        // Iterate each component
        foreach ($components as $type => $slice) {
            foreach ($slice as $component => $compversion) {
                if (($version === null &&
                        1 === version_compare($compversion, $phpversion)) ||    // C > PHP
                       (0 === version_compare($compversion, $version) ||        // C = S
                        1 === version_compare($compversion, $phpversion))) {    // C > PHP
                    
                    $res[$type][$component] =
                        call_user_func(array('PHP_Compat', $methods[$type]), $component);
                }
            }
        }

        return $res;
    }
}
