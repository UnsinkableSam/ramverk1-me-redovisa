<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class ApiExternalControllerTest extends TestCase
{


    // Create the di container.
    protected $di;
    protected $contoller;


    protected function setUp()
    {
        global $di;
        // global $contoller;
        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new ApiExternalController();
        $this->controller->setDI($this->di);
    }



    public function testIndex()
    {
        $res = $this->controller->indexAction();
        $testObj = gettype($res);

        $this->assertContains("object", $testObj);
    }

    public function testExternalInfo()
    {
        $res = $this->controller->externalInfoAction();
        $testObj = gettype($res);

        $this->assertContains("object", $testObj);
    }



    public function testvalidateipActionGet()
    {

        $this->controller->setDI($this->di);
        $this->controller->validateipActionGet("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");


        $this->assertContains("htdocs/InternalController/ipinfo/", "htdocs/InternalController/ipinfo/");
    }
}
