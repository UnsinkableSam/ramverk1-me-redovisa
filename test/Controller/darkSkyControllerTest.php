<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class DarkSkyControllerTest extends TestCase
{


    // Create the di container.
    protected $di;
    protected $controller;

    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new DarkSkyController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }



    public function testDarkIndex()
    {
        $res = $this->controller->indexAction();
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("object", $testObj);
    }


    public function testJsonIndex()
    {
        $res = $this->controller->indexJsonAction();
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("object", $testObj);
    }

    public function testDarkActionPost()
    {

        $res = $this->controller->darkActionPost("74.125.224.72");
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("object", $testObj);


        $res = $this->controller->darkActionPost("56.2, 15.5167");
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("object", $testObj);
    }


    public function testDarkJsonActionGet()
    {
        $res = $this->controller->darkJsonActionGet("74.125.224.72");
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("string", $testObj);


        $res = $this->controller->darkJsonActionGet("56.2, 15.5167");
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("string", $testObj);


        $res = $this->controller->darkJsonActionGet("56.215.5167");
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("string", $testObj);
    }
}
