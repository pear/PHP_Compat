--TEST--
Function -- file_put_contents -- simple
--SKIPIF--
<?php if (function_exists('file_put_contents')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = "abcd";
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$data = implode('', file($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data;
?>
--EXPECT--
4
abcd