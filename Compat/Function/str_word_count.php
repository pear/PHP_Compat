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
 * Replace str_word_count()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/str_word_count
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.3.0
 * @require     PHP 4.0.1 (trigger_error)
 */
if (!function_exists('str_word_count'))
{
    function str_word_count ($string, $format = null)
    {
        if ($format != 1 && $format != 2 && $format !== null) {
            trigger_error("str_word_count() The specified format parameter, '$format' is invalid", E_USER_WARNING);
            return false;
        }

		$word_string = preg_replace('/[0-9]+/', '', $string);
		$word_array  = preg_split('/[^A-Za-z0-9_\']+/', $wordstr, -1, PREG_SPLIT_NO_EMPTY);

		switch ($format):
			case null:
				return count($word_array);
				break;
			
			case 1:
				return $word_array;
				break;

			case 2:
				$lastmatch = 0;
				foreach ($word_array as $word) {
					$array[$lastmatch = strpos($string, $word, $lastmatch)] = $word;
				}
				return $array;
				break;

		endswitch;
    }
}

?>