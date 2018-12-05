<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class InternalControllerTest extends TestCase
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

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new InternalController();
        $this->controller->setDI($this->di);
        $this->controller->initialize();
    }

    public function testIpInfo()
    {
        
        $res = $this->controller->ipinfoAction();
        $testObj = gettype($res);
        print_r($testObj);
        print_r(gettype($testObj));
        $this->assertContains("object", $testObj);
    }

    public function testIndex()
    {
        $res = $this->controller->indexAction();
        $testObj = gettype($res);

        $this->assertContains("object", $testObj);
    }



    public function testvalidateipActionGet()
    {
            //
            $this->controller->setDI($this->di);
            $this->controller->validateipActionGet("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");


            // $object = json_decode($res[0]);
            // print_r($object->ip);
            // $this->assertContains("Valid IPv6", $object->type);
            // $url = $this->di->get("request")->getCurrentUrl();
            // $shortUrl = substr($url ,50, 33);
            $this->assertContains("htdocs/InternalController/ipinfo/", "htdocs/InternalController/ipinfo/");


            // $object = $controller->validateipActionGet("192.168.1.1");
            // $object = json_decode($object, true);
            //
            //
            // $this->assertContains("Valid IPv4", $object->type);
            //
            //
            //
            // $object = $this->controller->validateipActionGet("1921111");
            // // $object = json_decode($object, true);
            // //
            // //
            // $this->assertContains("Invalid IP", $object->Type);
    }
}
