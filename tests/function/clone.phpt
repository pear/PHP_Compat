--TEST--
Function -- clone
--SKIPIF--
<?php if (version_compare(phpversion(), '5.0') === 1) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat/Function/clone.php';

// Test classes
class testclass
{
    var $foo = 'foo';
}

class testclass2
{
    var $foo = 'foo';

    function __clone()    
    {
        $this->foo = 'bar';
    }
}

class testclass3
{
    var $bar;
}

class testclass4
{
    var $foo;
    function __clone()
    {
        $this->foo = php_compat_clone($this->foo);
    }
}

// Test 1: Initial value
$aa = new testclass;
echo $aa->foo, "\n"; // foo

// Test 2: Not referenced
$bb = php_compat_clone($aa);
$bb->foo = 'baz';
echo $aa->foo, "\n"; // foo

// Test 3: __clone method
$cc = new testclass2;
echo $cc->foo, "\n"; // foo
$dd = php_compat_clone($cc);
echo $dd->foo, "\n"; // bar

// Test 4: Bug #3649
$a = new testclass3;
$a->foo =& new testclass4;
$a->foo->bar = 'hello';
$aclone = php_compat_clone($a);
$aclone->b->bar = 'goodbye';
echo $a->foo->bar, "\n";

?>
--EXPECT--
foo
foo
foo
bar
hello