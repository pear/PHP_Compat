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
 * Replace str_ireplace()
 *
 * Added in PHP 5
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.str_ireplace
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @todo		Test, Fix, etc
 */
if (!function_exists('str_ireplace'))
{
	function stri_replace($find,$replace,$string)
	{
		   if(!is_array($find)) $find = array($find);
		   if(!is_array($replace))
		   {
				   if(!is_array($find)) $replace = array($replace);
				   else
				   {
						   // this will duplicate the string into an array the size of $find
						   $c = count($find);
						   $rString = $replace;
						   unset($replace);
						   for ($i = 0; $i < $c; $i++)
						   {
								   $replace[$i] = $rString;
						   }
				   }
		   }
		   foreach($find as $fKey => $fItem)
		   {
				   $between = explode(strtolower($fItem),strtolower($string));
				   $pos = 0;
				   foreach($between as $bKey => $bItem)
				   {
						   $between[$bKey] = substr($string,$pos,strlen($bItem));
						   $pos += strlen($bItem) + strlen($fItem);
				   }
				   $string = implode($replace[$fKey],$between);
		   }
		   return($string);
	}
}

?>