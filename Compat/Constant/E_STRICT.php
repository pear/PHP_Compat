<?php
/**
 * Replace constant E_STRICT
 * PHP 5
 *
 * http://php.net/manual/ref.errorfunc.php#e-strict
 *
 * @author        Aidan Lister <aidan@php.net>
 * @version       1.0
 */
if (!defined('PATH_SEPARATOR')) {
    define('E_STRICT', 2048);
}

?>