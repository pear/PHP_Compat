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
// | Authors: David Irvine <dave@codexweb.co.za>                          |
// |          Aidan Lister <aidan@php.net>                                |
// +----------------------------------------------------------------------+
//
// $Id$
//


if (!defined('ENT_NOQUOTES')) {
    define('ENT_NOQUOTES', 0);
}

if (!defined('ENT_COMPAT')) {
    define('ENT_COMPAT', 2);
}

if (!defined('ENT_QUOTES')) {
    define('ENT_QUOTES', 3);
}


/**
 * Replace html_entity_decode()
 *
 * @category    PHP
 * @package     PHP_Compat
 * @link        http://php.net/function.html_entity_decode
 * @author      David Irvine <dave@codexweb.co.za>
 * @author      Aidan Lister <aidan@php.net>
 * @version     $Revision$
 * @since       PHP 4.3.0
 * @internal	setting the charset does nothing
 */
if (!function_exists('html_entity_decode'))
{
    function html_entity_decode ($string, $quote_style = ENT_COMPAT, $charset = null)
    {
        if (!is_int($quote_style)) {
            trigger_error('html_entity_decode() expects parameter 2 to be long, ' . gettype($quote_style) . ' given', E_USER_WARNING);
            return null;
        }
		
		$trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);

        // Translating single quotes
        if ($quote_style & 1) {
            // Add single quote to translation table;
            $trans_tbl['&apos;'] = '\'';
        }

        // Not translating double quotes
        if (!($quote_style & 2)) { 
            // Remove double quote from translation table
            unset($trans_tbl['&quot;']);
        }

        return strtr($string, $trans_tbl);
    }
}
?>