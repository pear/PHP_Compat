<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4														|
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group								|
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,	   |
// | that is bundled with this package in the file LICENSE, and is		|
// | available at through the world-wide-web at						   |
// | http://www.php.net/license/3_0.txt.								  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to		  |
// | license@php.net so we can mail you a copy immediately.			   |
// +----------------------------------------------------------------------+
// | Authors: Aidan Lister <aidan@php.net>								|
// +----------------------------------------------------------------------+
//
// $Id$
//


/**
 * Replace str_ireplace()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.str_ireplace
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @added       PHP5
 * @requires	PHP3
 */
if (!function_exists('str_ireplace2'))
{
	function str_ireplace2 ($search, $replace, $subject, &$count = 0)
	{
		// If search isn't an array, make it one
		if (!is_array($search)) {
			$search = array ($search);
		}
	
		// If replace isn't an array, make it one, and pad it to the length of search
		if (!is_array($replace))
		{
			$replace_string = $replace;

			$replace = array ();
			for ($i = 0, $c = count($search); $i < $c; $i++)
			{
				$replace[$i] = $replace_string;
			}
		}

		// Loop through each search
		foreach ($search as $find_key => $find_value)
		{
			// Split the array into segments, in between each part is our search
			$segments = explode(strtolower($find_value), strtolower($subject));

			// The number of replacements done is the number of segments minus the first
			$count += count($segments) - 1;
			$pos = 0;

			// Loop through each segment
			foreach ($segments as $segment_key => $segment_value)
			{
				// Replace the lowercase segments with the upper case versions
				$segments[$segment_key] = substr($subject, $pos, strlen($segment_value));
				// Increase the position relative to the initial string
				$pos += strlen($segment_value) + strlen($find_value);
			}
	
			// Put our original string back together
			$subject = implode($replace[$find_key], $segments);
		}

		return $subject;
	}
}

?>