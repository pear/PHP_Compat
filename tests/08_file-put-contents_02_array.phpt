--TEST--
PHP_Compat file_put_contents() -- simple
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

$string = array('foo', 'bar');
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$data = implode('', file($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data;
?>
--EXPECT--
6
foobar