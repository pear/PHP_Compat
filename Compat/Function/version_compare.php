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
// | Authors: Philippe Jausions <Philippe.Jausions@11abacus.com>          |
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$
//


/**
 * Replace version_compare()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/version_compare
 * @author      Philippe Jausions <Philippe.Jausions@11abacus.com>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.1.0
 * @require     PHP 4.0.1 (trigger_error)
 */
if (!function_exists('version_compare'))
{
    function version_compare ($version1, $version2, $operator = '')
    {
        if (!is_scalar($version1)) {
            trigger_error('version_compare() expects parameter 1 to be string, ' . gettype($version1) . ' given', E_USER_WARNING);
            return null;
        }

        if (!is_scalar($version2)) {
            trigger_error('version_compare() expects parameter 2 to be string, ' . gettype($version2) . ' given', E_USER_WARNING);
            return null;
        }

        if (!is_scalar($operator)) {
            trigger_error('version_compare() expects parameter 3 to be string, ' . gettype($operator) . ' given', E_USER_WARNING);
            return null;
        }

        $v1 = explode('.',
            str_replace('..', '.',
                preg_replace('/([^0-9\.]+)/', '.$1.',
                    str_replace(array('-', '_', '+'), '.',
                        trim($version1)))));

        while (empty($v1[0]) && array_shift($v1)) {
        }

        $v2 = explode('.',
            str_replace('..', '.',
                preg_replace('/([^0-9\.]+)/', '.$1.',
                    str_replace(array('-', '_', '+'), '.',
                        trim($version2)))));

        while (empty($v2[0]) && array_shift($v2)) {
        }

        $versions = array(
            'dev'   => 0,
            'alpha' => 1,
            'a'     => 1,
            'beta'  => 2,
            'b'     => 2,
            'RC'    => 3,
            'pl'    => 4);

        $compare = 0;
        for ($i = 0; $i < min(count($v1), count($v2)); $i++) {
            if ($v1[$i] == $v2[$i]) {
                continue;
            }
            if (is_numeric($v1[$i]) && is_numeric($v2[$i])) {
                $compare = ($v1[$i] < $v2[$i]) ? -1 : 1;

            } elseif (is_numeric($v1[$i])) {
                $compare = 1;

            } elseif (is_numeric($v2[$i])) {
                $compare = -1;

            } elseif (isset($versions[$v1[$i]])
                      && isset($versions[$v2[$i]]))  {
                $compare = ($versions[$v1[$i]] < $versions[$v2[$i]]) ? -1 : 1;

            } else {
                $compare = strcmp($v2[$i], $v1[$i]);
            }
            break;
        }

        if ($compare == 0) {
            if (count($v2) > count($v1)) {
                if (isset($versions[$v2[$i]])) {
                    $compare = ($versions[$v2[$i]] < 4) ? 1 : -1;
                } else {
                    $compare = -1;
                }
            } elseif (count($v2) < count($v1)) {
                if (isset($versions[$v1[$i]])) {
                    $compare = ($versions[$v1[$i]] < 4) ? -1 : 1;
                } else {
                    $compare = 1;
                }
            }
        }

        switch ($operator)
		{
            case '>':
            case 'gt':
                return ($compare > 0) ? 1 : 0;
                break;
            case '>=':
            case 'ge':
                return ($compare >= 0) ? 1 : 0;
                break;
            case '<':
            case 'lt':
                return ($compare < 0) ? 1 : 0;
                break;
            case '<=':
            case 'le':
                return ($compare <= 0) ? 1 : 0;
                break;
            case '==':
            case 'eq':
                return ($compare == 0) ? 1 : 0;
                break;
            case '<>':
            case '!=':
            case 'ne':
                return ($compare != 0) ? 1 : 0;
                break;
            default:
                return null;
        }
    }
}

?>