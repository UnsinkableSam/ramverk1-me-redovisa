<?php

namespace Anax\IpValidators;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class IpValidatorApiTest extends TestCase
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
        $this->controller = new IpValidatorApi();
        // $this->controller->setDI($this->di);
    }




    public function testvalidateipActionGet()
    {

        $res = $this->controller->validateipActionGet("712313313");
        $resArray = json_decode($res[0]);
        $this->assertContains("Invalid IP", $resArray->Type);

        $res = $this->controller->validateipActionGet("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");
        $resArray = json_decode($res[0]);
        $this->assertContains("Valid IPv6", $resArray->Type);


        $res = $this->controller->validateipActionGet("74.125.224.72");
        $resArray = json_decode($res[0]);
        $this->assertContains("Valid IPv4", $resArray->Type);
    }





        // public function testvalidateipActionPost()
        // {
        //
        //         $this->controller->setDI($this->di);
        //         $resString = $this->controller->validateipActionPost("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");
        //         $res = json_decode($resString);
        //
        //         $this->assertContains("2001:0db8:85a3:08d3:1319:8a2e:0370:7334", $res->ip);
        //
        //
        // }
}
