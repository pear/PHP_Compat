--TEST--
Function -- array_udiff_uassoc
--SKIPIF--
<?php if (function_exists('array_udiff_uassoc')) { echo 'skip'; } ?>
--FILE--
<?php
require_once 'PHP/Compat.php';
PHP_Compat::loadFunction('array_udiff_uassoc');

class cr
{
    var $priv_member;

    function cr($val)
    {
        $this->priv_member = $val;
    }

    function comp_func_cr($a, $b)
    {
        if ($a->priv_member === $b->priv_member) return 0;
        return ($a->priv_member > $b->priv_member) ? 1 : -1;
    }
   
    function comp_func_key($a, $b)
    {
        if ($a === $b) return 0;
        return ($a > $b) ? 1 : -1;
    }
}

$a = array('0.1' => new cr(9), '0.5' => new cr(12), 0 => new cr(23), 1 => new cr(4), 2 => new cr(-15));
$b = array('0.2' => new cr(9), '0.5' => new cr(22), 0 => new cr(3), 1 => new cr(4), 2 => new cr(-15));

$result = array_udiff_uassoc($a, $b, array('cr', 'comp_func_cr'), array('cr', 'comp_func_key'));
echo serialize($result);
?>
--EXPECT--
FIXME