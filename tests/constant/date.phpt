--TEST--
Constant -- DATE
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadConstant('DATE');

if (defined('DATE_ATOM') && DATE_ATOM === 'Y-m-d\TH:i:sO')) { echo "pass\n"; }
if (defined('DATE_COOKIE') && DATE_ATOM === 'D, d M Y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_ISO8601') && DATE_ATOM === 'Y-m-d\TH:i:sO')) { echo "pass\n"; }
if (defined('DATE_RFC822') && DATE_ATOM === 'D, d M Y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_RFC850') && DATE_ATOM === 'l, d-M-y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_RFC1036') && DATE_ATOM === 'l, d-M-y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_RFC1123') && DATE_ATOM === 'D, d M Y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_RFC2822') && DATE_ATOM === 'D, d M Y H:i:s O')) { echo "pass\n"; }
if (defined('DATE_RSS') && DATE_ATOM === 'D, d M Y H:i:s T')) { echo "pass\n"; }
if (defined('DATE_W3C') && DATE_ATOM === 'Y-m-d\TH:i:sO')) { echo "pass\n"; }

?>
--EXPECT--
true