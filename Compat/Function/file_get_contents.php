<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
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
//


/**
 * Replace file_get_contents()
 *
 * Added in PHP 5
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.file_get_contents
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @internal    $resource_context is not supported
 */
if (!function_exists('file_get_contents'))
{
    function file_get_contents ($filename, $incpath = false, $resource_context = null)
    {
        $file = fopen($filename, 'rb', $incpath);

        if ($file) {
			clearstatcache();
            if ($fsize = filesize($filename)) {
                $data = fread($file, $fsize);
            }
            
            else {
                while (!feof($file)) {
                    $data .= fread($file, 8192);
                }
            }

            fclose($file);
        }

        return $data;
    }
}

?>