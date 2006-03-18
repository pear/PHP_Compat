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
// |          Arpad Ray <arpad@php.net>                                   |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Emulate enviroment register_globals=on
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/register_globals
 * @author      Aidan Lister <aidan@php.net>
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 */
if (!ini_get('register_globals')) {
    $superglobals = array(
        'S' => '_SESSION',
        'E' => '_ENV',
        'C' => '_COOKIE',
        'P' => '_POST',
        'G' => '_GET'
    );
    $order = ini_get('variables_order');
    $order_length = strlen($order);
    $inputs = array();

    // determine on which arrays to operate and in what order
    for ($i = 0; $i < $order_length; $i++) {
        $key = strtoupper($order[$i]);
        if (!isset($superglobals[$key])
             || ($key == 'S' && !isset($_SESSION))) {
            continue;
        }
        if ($key == 'P' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputs[] = $_FILES;
        }
        $inputs[] = ${$superglobals[$key]};
    }

    // extract the specified arrays
    $superglobals[] = 'GLOBALS';
    for ($i = 0, $c = count($inputs); $i < $c; $i++) {
        // ensure users can't set superglobals
        $ins = array_intersect($superglobals, array_keys($inputs[$i]));
        if (empty($ins)) {
            extract($inputs[$i]);
        }
    }

    // Register the change
    ini_set('register_globals', 'on');
}
