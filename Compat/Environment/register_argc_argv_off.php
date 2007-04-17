<?php
// $Id$


/**
 * Emulate enviroment register_argc_argv=off
 *
 * @category    PHP
 * @package     PHP_Compat
 * @license     LGPL - http://www.gnu.org/licenses/lgpl.html
 * @copyright   2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
 * @link        http://php.net/manual/en/ini.core.php#ini.register-argc-argv
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 */
if (isset($GLOBALS['argc'], $GLOBALS['argv'])) {
    unset($GLOBALS['argc']);
    unset($GLOBALS['argv']);

    // Register the change
    ini_set('register_argc_argv', 'off');
}
