--TEST--
Function -- scandir -- simple
--SKIPIF--
<?php if (function_exists('scandir')) { echo 'skip'; } ?>
--FILE--
<?php
require_once ('PHP/Compat.php');
PHP_Compat::loadFunction('scandir');

// Create a folder and fill it with files
mkdir('tmp');
touch('tmp/test1');
touch('tmp/test2');

// Scan it
$dir    = 'tmp';
$files = scandir($dir);

// List the results
print_r($files);

// Remove the files
unlink('tmp/test1');
unlink('tmp/test2');
rmdir('tmp');
?>
--EXPECT--
Array
(
    [0] => .
    [1] => ..
    [2] => test1
    [3] => test2
)