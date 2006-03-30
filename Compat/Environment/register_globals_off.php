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
 * Emulate enviroment register_globals=off
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/register_globals
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */
if (ini_get('register_globals')) {
    $ignore = array('GLOBALS', '_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER',
                '_ENV', '_FILES');

    $input = array_merge($_GET, $_POST, $_COOKIE, $_SERVER, $_ENV, $_FILES,
                isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());
  
    foreach ($input as $k => $v) {
        if (!in_array($k, $ignore) && isset($GLOBALS[$k])) {
            unset($GLOBALS[$k]);
        }
    }

    // Register the change
    ini_set('register_globals', 'off');
}
