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
	function str_ireplace2 ($search, $replace, $subject, $count = null)
	{
		if (!is_array($search)) {
			$search = array ($search);
		}

		if (!is_array($replace))
		{
			if (!is_array($search)) {
				$replace = array ($replace);
			}
			else
			{
				$c = count($search);
				$rString = $replace;
				unset($replace);

				for ($i = 0; $i < $c; $i++) {
					$replace[$i] = $rString;
				}
			}
		}

		foreach ($search as $find_key => $find_item)
		{
			$between = explode(strtolower($find_item), strtolower($subject));
			$pos = 0;

			foreach ($between as $between_key => $between_item)
			{
				$between[$between_key] = substr($subject, $pos, strlen($between_item));
				$pos += strlen($between_item) + strlen($find_item);
			}

			$subject = implode($replace[$find_key], $between);
		}

		return $subject;
	}
}

?>