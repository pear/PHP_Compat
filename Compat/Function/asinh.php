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
// | Authors: Arpad Ray <arpad@php.net>                                   |
// +----------------------------------------------------------------------+
//
// $Id$


/**
 * Replace asinh()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.asinh
 * @author      Arpad Ray <arpad@php.net>
 * @version     $Revision$
 * @since       PHP 5
 * @require     PHP 3.0.0
 */
function php_compat_asinh($n)
{
    return ln($n + sqrt(1 + pow($n, 2)));
}

if (!function_exists('asinh')) {
    function asinh($n)
    {
	return php_compat_asinh($n);
    }
}
