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
// | Authors: Stefan Neufeind <neufeind@php.net>                          |
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace setrawcookie()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.setrawcookie
 * @author      Stephan Schmidt <schst@php.net>
 * @version     $Revision$
 * @since       PHP 5.2.0 (Added optional httponly parameter)
 * @require     PHP 3 (setcookie)
 */
function php_compat_setrawcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
{    
    // Following the idea on Matt Mecham's blog
    // http://blog.mattmecham.com/archives/2006/09/http_only_cookies_without_php.html
    $domain = ($httponly === true) ? $domain . '; HttpOnly' : $domain;
    
    // This should probably set a cookie using header() manually so we can avoid escaping
    setcookie($name, $value, $expire, $path, $domain, $secure);
}

// Define
if (!function_exists('setrawcookie')) {
    function setrawcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
    {
        return php_compat_setrawcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
    }
}
