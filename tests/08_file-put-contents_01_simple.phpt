--TEST--
PHP_Compat file_put_contents() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = "abcd";
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$data = implode('', fopen($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data;
?>
--EXPECT--
4
abcd