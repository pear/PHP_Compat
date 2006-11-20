| <?php
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
 * Replace array_fill()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.array_fill
 * @author      Jim Wigginton <terrafrost@php.net>
 * @version     $Revision$
 * @since       PHP 4.2.0
 */
function php_compat_array_fill($start_index, $num, $value)
{
    if ($num <= 0) {
        user_error('array_fill(): Number of elements must be positive', E_USER_WARNING);

        return false;
    }

    $temp = array();

    $end_index = $start_index + $num;
    for ($i = (int) $start_index; $i < $end_index; $i++) {
        $temp[$i] = $value;
    }

    return $temp;
}

// Define
if (!function_exists('array_fill')) {
    function array_fill($start_index, $num, $value)
    {
        return php_compat_array_fill($start_index, $num, $value);
    }
}

?>