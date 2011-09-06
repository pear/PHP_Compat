<?php
/**
 * Replicate datetime constants
 *
 * PHP version 4
 *
 * @category  PHP
 * @package   PHP_Compat
 * @author    Rhett Waldock <rwaldock@gmail.com>
 * @copyright 2004-2007 Aidan Lister <aidan@php.net>, Arpad Ray <arpad@php.net>
 * @license   LGPL - http://www.gnu.org/licenses/lgpl.html
 * @version   $SVN: 274507 $
 * @link      http://www.php.net/manual/en/class.datetime.php
 * @since     PHP 5.1.1
 */
if (!defined('DATE_ATOM')) {
    /**
     * Atom (example: 2005-08-15T15:52:01+00:00)
     */
    define('DATE_ATOM', 'Y-m-d\TH:i:sP');
}
if (!defined('DATE_COOKIE')) {
    /**
     * HTTP Cookies (example: Monday, 15-Aug-05 15:52:01 UTC)
     */
    define('DATE_COOKIE', 'D, d M Y H:i:s T');
}
if (!defined('DATE_ISO8601')) {
    /**
     * ISO-8601 (example: 2005-08-15T15:52:01+0000)
     */
    define('DATE_ISO8601', 'Y-m-d\TH:i:sO');
}
if (!defined('DATE_RFC822')) {
    /**
     * RFC 822 (example: Mon, 15 Aug 05 15:52:01 +0000)
     */
    define('DATE_RFC822', 'D, d M Y H:i:s T');
}
if (!defined('DATE_RFC850')) {
    /**
     * RFC 850 (example: Monday, 15-Aug-05 15:52:01 UTC)
     */
    define('DATE_RFC850', 'l, d-M-y H:i:s T');
}
if (!defined('DATE_RFC1036')) {
    /**
     * RFC 1036 (example: Mon, 15 Aug 05 15:52:01 +0000)
     */
    define('DATE_RFC1036', 'l, d-M-y H:i:s T');
}
if (!defined('DATE_RFC1123')) {
    /**
     * RFC 1123 (example: Mon, 15 Aug 2005 15:52:01 +0000)
     */
    define('DATE_RFC1123', 'D, d M Y H:i:s T');
}
if (!defined('DATE_RFC2822')) {
    /**
     * RFC 2822 (Mon, 15 Aug 2005 15:52:01 +0000)
     */
    define('DATE_RFC2822', 'D, d M Y H:i:s O');
}
if (!defined('DATE_RFC3339')) {
    /**
     * Same as DATE_ATOM (since PHP 5.1.3)
     */
    define('DATE_RFC3339', DATE_ATOM);
}
if (!defined('DATE_RSS')) {
    /**
     * RSS (Mon, 15 Aug 2005 15:52:01 +0000)
     */
    define('DATE_RSS', 'D, d M Y H:i:s T');
}
if (!defined('DATE_W3C')) {
    /**
     * World Wide Web Consortium (example: 2005-08-15T15:52:01+00:00)
     */
    define('DATE_W3C', 'Y-m-d\TH:i:sO');
}
