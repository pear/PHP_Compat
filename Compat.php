<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2 of the PHP license,         |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://au.php.net/license/3_0.txt.                                   |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Aidan Lister <aidan@php.net>                                 |
// +----------------------------------------------------------------------+
//
// $id$
//


/**
 * Provides a set of functions replacing missing functionality
 *   in older versions of PHP
 *
 * This class should be called statically
 *
 * Optionally, you may simply include the file.
 *   e.g. require_once 'PHP/Compat/Function/scandir.php';
 *
 * @version        0.1
 * @author         Aidan Lister <aidan@php.net>
 */
class PHP_Compat
{

    /**
     * Load function[s]
     *
     * @param string|array $function The function[s] to load.
     * @return void
     */
	function addFunction ($function)
	{
		if (is_array($function)) {
			foreach ($function as $singlefunc) {
				PHP_Compat::addFunction($singlefunc);
			}
		}

		else {
			$file = sprintf('PHP/Compat/Function/%s.php',
								$function);

			if (@include_once $file !== false) {
				return true;
			}

			return false;
		}
	}


    /**
     * Load constant[s]
     *
     * @param string|array $constant The constant[s] to load.
     * @return void
     */
	function addConstant ($constant)
	{
		if (is_array($constant)) {
			foreach ($constant as $singleconst) {
				PHP_Compat::addFunction($singleconst);
			}
		}

		else {
			$file = sprintf('PHP/Compat/Constant/%s.php',
								$constant);

			if (@include_once $file !== false) {
				return true;
			}

			return false;
		}
	}

}

?>