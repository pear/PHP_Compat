--TEST--
Function -- file_put_contents
--SKIPIF--
<?php if (function_exists('file_put_contents')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('file_put_contents');

// With a string
$string = "abcd";
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$data = implode('', file($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data, "\n";

// With an array
$string = array('foo', 'bar');
$tmpfname = tempnam('/tmp', 'php');

$res = file_put_contents($tmpfname, $string);
$data = implode('', file($tmpfname));

unlink($tmpfname);

echo $res, "\n";
echo $data, "n";

// Test append
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
4
abcd
6
foobar
6
8
foobartesttest
8
testtest