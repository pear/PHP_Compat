--TEST--
PHP_Compat file_put_contents() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = "abcd";
$tmpfname = tempnam('/tmp', 'php');

echo file_put_contents($tmpfname, $string);

unlink($tmpfname);
?>
--EXPECT--
4