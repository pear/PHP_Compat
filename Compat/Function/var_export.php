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
 * Replace var_export()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.var_export
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @added       PHP 4.2.0
 * @requires    PHP 3
 */
if (!function_exists('var_export'))
{
    function var_export ()
    {
		$args = func_get_args();
		$indent = (isset($args[2])) ? $args[2] : '';

		if (is_array($args[0]))
		{
			$output = 'array ('."\n";

			foreach ($args[0] as $k => $v)
			{
				if (is_numeric($k))
					$output .= $indent.'  '.$k.' => ';
				else
					$output .= $indent.'  \''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', $k)).'\' => ';

				if (is_array($v))
					$output .= var_export($v, true, $indent.'  ');
				else
				{
					if (gettype($v) != 'string' && !empty($v))
						$output .= $v.','."\n";
					else
						$output .= '\''.str_replace('\'', '\\\'', str_replace('\\', '\\\\', $v)).'\','."\n";
				}
			}

			$output .= ($indent != '') ? $indent.'),'."\n" : ')';
		}
		else
			$output = $args[0];

		if ($args[1] == true)
			return $output;
		else
			echo $output;
    }
}
?>