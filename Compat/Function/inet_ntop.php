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
 * Replace inet_ntop()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.inet_ntop
 * @author      Magical Tux <magicaltux@gmail.com>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.0
 * @require     PHP 4.0.0 (user_error)
 */
if (!function_exists('inet_ntop')) {
    function inet_ntop($ip)
    {
       // IPv4
       if (strlen($ip) === 4) {
            list(, $ip) = unpack('N', $ip);
            $ip = long2ip($ip);

       // IPv6
       } elseif (strlen($ip) === 16) {
            $ip  = bin2hex($ip);
            $ip  = substr(chunk_split($ip, 4, ':'), 0, -1);
            $ip  = explode(':', $ip);
            $res = '';
            foreach ($ip as $seg) {
                while ($seg{0} === '0') {
                    $seg = substr($seg, 1)
                };

                if ($seg !== '') {
                    $res .= ($res === '' ? '' : ':') . $seg;
                } else {
                    if (strpos($res, '::') === false) {
                        if (substr($res, -1) === ':') {
                            continue;
                        }

                        $res .= ':';
                        
                        continue;
                    }

                    $res .= ($res === '' ? '' : ':') . '0';
                }
            }

            $ip = $res;
        }

        return $ip;
    }
}

?>