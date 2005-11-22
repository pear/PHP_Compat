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
 * Replace inet_pton()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.inet_pton
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.2.0
 * @require     PHP 4.0.0 (user_error)
 */
if (!function_exists('inet_pton')) {
    function inet_pton($ip)
    {
        // IPv4
        if (strlen($ip) === 4) {
            return pack("N",sprintf("%u",ip2long($addr)));
        
        // IPv6
        } elseif (strlen($ip) === 16) {
            $ipv6 = Net_IPv6::uncompress($addr);
            $str = Array();
            foreach(explode(':', $ipv6) as $component) {
                $str[] = hexdec($component);
            }

            eval('$str=pack(\'N*\',\''.join("','",$str)."');");
            return $str;
        }

        return false;
    }
}

?>