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
 * Replace convert_uudecode()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/convert_uudecode
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 5
 * @require     PHP 4.0.1 (trigger_error)
 */
if (!function_exists('convert_uudecode'))
{
    function convert_uudecode($data)
    {
        // Sanity check
        if ($data == '') {
            return false;
        }

        // Split into number of lines
        $lines = preg_split("/\r?\n/", trim($data));
        $decode = '';

        // Loop through each line of the encoded data
        for ($i = 0, $ii = count($lines); $i < $ii; $i++)
        {
            $pos = 1;
            $d   = 0;
            $len = (int) (((ord(substr($str[$i], 0, 1)) - 32) - ' ') & 077);

            // Process 3 chars at a time
            while (($d + 3 <= $len) && ($pos + 4 <= strlen($str[$i]))) {
                $c0 = (ord(substr($lines[$i], $pos, 1)) ^ 0x20);
                $c1 = (ord(substr($lines[$i], $pos + 1, 1)) ^ 0x20);
                $c2 = (ord(substr($lines[$i], $pos + 2, 1)) ^ 0x20);
                $c3 = (ord(substr($lines[$i], $pos + 3, 1)) ^ 0x20);

                $decode .= chr(((($c0 - ' ') & 077) << 2) | ((($c1 - ' ') & 077) >> 4));
                $decode .= chr(((($c1 - ' ') & 077) << 4) | ((($c2 - ' ') & 077) >> 2));
                $decode .= chr(((($c2 - ' ') & 077) << 6) |  (($c3 - ' ') & 077));

                $pos += 4;
                $d += 3;
            }

            // Process a left over of two
            if (($d + 2 <= $len) && ($pos + 3 <= strlen($str[$i]))) {
                $c0 = (ord(substr($lines[$i], $pos, 1)) ^ 0x20);
                $c1 = (ord(substr($lines[$i], $pos + 1, 1)) ^ 0x20);
                $c2 = (ord(substr($lines[$i], $pos + 2, 1)) ^ 0x20);

                $decode .= chr(((($c0 - ' ') & 077) << 2) | ((($c1 - ' ') & 077) >> 4));
                $decode .= chr(((($c1 - ' ') & 077) << 4) | ((($c2 - ' ') & 077) >> 2));

                $pos += 3;
                $d += 2;
            }
        
            // Process a left over of one
            if (($d + 1 <= $len) && ($pos + 2 <= strlen($str[$i]))) {
                $c0 = (ord(substr($lines[$i], $pos, 1)) ^ 0x20);
                $c1 = (ord(substr($lines[$i], $pos + 1, 1)) ^ 0x20);

                $decode .= chr(((($c0 - ' ') & 077) << 2) | ((($c1 - ' ') & 077) >> 4));
            }
        }

        return $decode;
    }
}

?>