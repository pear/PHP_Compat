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
 * Replace array_combine()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_chunk
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @added       PHP 4.2.0
 * @requires    PHP 3
 */
if (!function_exists('array_chunk'))
{
    function array_chunk ($input, $size, $preserve_keys = false)
    {
        if (!is_array($input)) {
            trigger_error('array_chunk() expects parameter 1 to be array, ' . gettype($input) . ' given', E_USER_WARNING);
            return null;
        }
		
        if (!is_int($size)) {
            trigger_error('array_chunk() expects parameter 2 to be long, ' . gettype($size) . ' given', E_USER_WARNING);
            return null;
        }
		
		$chunks = array ();

		// The input is smaller than the chunksize
		if (count($input) <= $size)
		{
			if ($preserve_keys !== false)
			{
				foreach ($input as $key => $value)
				{
					$chunks[0][$key] = $value;
				}
			}
			else
			{
				foreach ($input as $value)
				{
					$chunks[0][] = $value;
				}
			}
		}
	
		// The input is larger than the chunksize
		else
		{
			if ($preserve_keys !== false)
			{
				$j = $i = 0;
				foreach ($input as $key => $value)
				{
					$chunks[$j][$key] = $value;
					if (++$i == $size) {
						$j++;
					}
				}
			}
			else
			{
				$j = $i = 0;
				foreach ($input as $key => $value)
				{
					$chunks[$j][] = $value;
					if (++$i == $size) {
						$j++;
					}
				}
			}
		}

        return $chunks;
    }
}

?>