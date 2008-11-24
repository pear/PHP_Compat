<?php
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

class PHP_Compat_AllTests
{
    public static function main()
    {

        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PHP_Compat Tests');
        return $suite;
    }
}

?>