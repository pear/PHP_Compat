<?php
/**
 * Replace constant PATH_SEPARATOR
 * PHP 4.3.0-RC2
 * 
 * http://au2.php.net/ref.dir
 *
 * @author        Ross Smith <pearspam@netebb.com>
 * @author        Aidan Lister <aidan@php.net>
 * @version       1.0
 */
if (!defined('PATH_SEPARATOR')) {
    $path_separator = strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ?
        ';' :
        ':';

    define('PATH_SEPARATOR', $path_separator);
}

?>