--TEST--
PHP_Compat file_put_contents() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = 'foobar';
$string2 = 'testtest';
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$res = file_put_contents($tmpfname, $string2, FILE_APPEND);

$data = implode('', fopen($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data;
?>
--EXPECT--
6
foobartesttest