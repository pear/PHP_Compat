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
// | Authors: Laurent Laville <pear@laurent-laville.org>                  |
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace debug_print_backtrace()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.debug_print_backtrace
 * @author      Laurent Laville <pear@laurent-laville.org>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5
 * @require     PHP 4.3.0 (debug_backtrace)
 */
function php_compat_debug_print_backtrace()
{
    // Get backtrace
    $backtrace = debug_backtrace();

    // Unset call to debug_print_backtrace
    array_shift($backtrace);
    if (empty($backtrace)) {
        return '';
    }

    // Iterate backtrace
    $calls = array();
    foreach ($backtrace as $i => $call) {
        if (!isset($call['file'])) {
            $call['file'] = '(null)';
        }
        if (!isset($call['line'])) {
            $call['line'] = '0';
        }
        $location = $call['file'] . ':' . $call['line'];
        $function = (isset($call['class'])) ?
            $call['class'] . (isset($call['type']) ? $call['type'] : '.') . $call['function'] :
            $call['function'];

        $params = '';
        if (isset($call['args'])) {
            $args = array();
            foreach ($call['args'] as $arg) {
                if (is_array($arg)) {
                    $args[] = print_r($arg, true);
                } elseif (is_object($arg)) {
                    $args[] = get_class($arg);
                } else {
                    $args[] = $arg;
                }
            }
            $params = implode(', ', $args);
        }

        $calls[] = sprintf('#%d  %s(%s) called at [%s]',
            $i,
            $function,
            $params,
            $location);
    }

    echo implode("\n", $calls), "\n";
}

// Define
if (!function_exists('debug_print_backtrace')) {
    function debug_print_backtrace()
    {
        return php_compat_debug_print_backtrace();
    }
}
