<?php
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3 of the PHP license,         |
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
// $Id$
//


/**
 * Replace constant E_STRICT
 *
 * PHP 5
 *
 * http://php.net/manual/ref.errorfunc.php#e-strict
 *
 * @author        Aidan Lister <aidan@php.net>
 * @version       1.0
 */
if (!defined('E_STRICT')) {
    define('E_STRICT', 2048);
}

?>