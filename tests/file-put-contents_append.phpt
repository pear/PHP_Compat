--TEST--
Function -- file_put_contents -- using append
--SKIPIF--
<?php if (function_exists('file_put_contents')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = 'foobar';
$string2 = 'testtest';
$tmpfname = tempnam('/tmp', 'php');

echo file_put_contents($tmpfname, $string), "\n";
echo file_put_contents($tmpfname, $string2, FILE_APPEND), "\n";
echo implode('', file($tmpfname)), "\n";
echo file_put_contents($tmpfname, $string2), "\n";
echo implode('', file($tmpfname));

unlink($tmpfname);

?>
--EXPECT--
6
8
foobartesttest
8
testtest