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

define('PHP_COMPAT_GET_HEADERS_MAX_REDIRECTS', 5);

/**
 * Replace get_headers()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.get_headers
 * @author      Aeontech <aeontech@gmail.com>
 * @author      Cpurruc <cpurruc@fh-landshut.de>
 * @author      Aidan Lister <aidan@php.net>
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 * @since       PHP 5.0.0
 * @require     PHP 4.0.0 (user_error)
 */
function php_compat_get_headers($url, $format = 0)
{
    $result = array();
    for ($i = 0; $i < PHP_COMPAT_GET_HEADERS_MAX_REDIRECTS; $i++) {
        $headers = php_compat_get_headers_helper($url, $format);
        if ($headers === false) {
            return false;
        }
        $result = array_merge($result, $headers);
        if ($format == 1 && isset($headers['Location'])) {
            $url = $headers['Location'];
            continue;
        }
        if ($format == 0) {
            for ($j = count($headers); $j--;) {
                if (preg_match('/^Location: (.*)$/i', $headers[$j], $matches)) {
                    $url = $matches[1];
                    continue 2;
                }
            }
        }
        return $result;
    }
    return empty($result) ? false : $result;
}

function php_compat_get_headers_helper($url, $format)
{
    // Init
    $urlinfo = parse_url($url);
    $port    = isset($urlinfo['port']) ? $urlinfo['port'] : 80;

    // Connect
    $fp = fsockopen($urlinfo['host'], $port, $errno, $errstr, 30);
    if ($fp === false) {
        return false;
    }
          
    // Send request
    $head = 'HEAD ' . (isset($urlinfo['path']) ? $urlinfo['path'] : '/') .
        (isset($urlinfo['query']) ? '?' . $urlinfo['query'] : '') .
        ' HTTP/1.0' . "\r\n" .
        'Host: ' . $urlinfo['host'] . "\r\n\r\n";
    fputs($fp, $head);

    // Read
    $headers = array();
    while (!feof($fp)) {
        if ($header = trim(fgets($fp, 1024))) {
            list($key) = explode(':', $header);

            if ($format === 1) {
                // First element is the HTTP header type, such as HTTP 200 OK
                // It doesn't have a separate name, so check for it
                if ($key == $header) {
                    $headers[] = $header;
                } else {
                    $headers[$key] = substr($header, strlen($key)+2);
                }
            } else {
                $headers[] = $header;
            }
        }
    }

    fclose($fp);

    return $headers;
}

// Define
if (!function_exists('get_headers')) {
    function get_headers($url, $format = 0)
    {
        return php_compat_get_headers($url, $format);
    }
}
