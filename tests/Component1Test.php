<?php

/**
 * Run Test using
 * phpunit tests
 * from project base directory
 */

include __DIR__ . '/../vendor/autoload.php';

class Component1Test extends PHPUnit_Framework_TestCase {

    function testCreate() {
        $this->assertInstanceOf('TestComponents\Base_Component', new TestComponents\Component1());
    }

}
