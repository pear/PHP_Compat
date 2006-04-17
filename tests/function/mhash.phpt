--TEST--
Function -- mhash
--FILE--
<?php
require_once 'PHP/Compat/Function/mhash.php';

$tests = array(
    'MD5' => array( // test vectors from RFC2104
        'type'  => MHASH_MD5,
        'cases' => array(
            array(
                'key'   => str_repeat(chr(0x0b), 16),
                'data'  => 'Hi There'
            ),
            array(
                'key'   => 'Jefe',
                'data'  => 'what do ya want for nothing?'
            ),
            array(
                'key'   => str_repeat(chr(0xAA), 16),
                'data'  => str_repeat(chr(0xDD), 50)
            )
        )
    )
);

foreach ($tests as $name => $info) {
    foreach ($info['cases'] as $number => $case) {
        $result = php_compat_mhash($info['type'], $case['data'], $case['key']);
        echo $name, ' ', $number, ': ', bin2hex($result), "\n";
    }
}

?>
--EXPECT--
MD5 0: 9294727a3638bb1c13f48ef8158bfc9d
MD5 1: 750c783e6ab0b503eaa86e310a5db738
MD5 2: 56be34521d144c88dbb8c733f0e8b3f6