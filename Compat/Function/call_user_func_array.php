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
 * Replace call_user_func_array()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.call_user_func_array
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 * @added       PHP 4.0.4
 * @requires    PHP 3
 */
if (!function_exists('call_user_func_array'))
{
   function call_user_func_array($func, $args)
   {
       $argString = '';
       $comma = '';
       for ($i = 0; $i < count($args); $i ++) {
           $argString .= $comma . "\$args[$i]";
           $comma = ', ';
       }

       if (is_array($func)) {
           $obj =& $func[0];
           $meth = $func[1];
           if (is_string($func[0])) {
               eval("\$retval = $obj::\$meth($argString);");
           } else {
               eval("\$retval = \$obj->\$meth($argString);");
           }
       } else {
           eval("\$retval = \$func($argString);");
       }
       return $retval;
   }
}
?>