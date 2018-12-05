<?php

namespace Anax\IpValidators;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class InternalValidatorTest extends TestCase
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
        $this->controller = new InternalValidator();
        // $this->controller->setDI($this->di);
    }


    //
    // public function testIndex()
    // {
    //     $res = $this->controller->indexAction();
    //     $testObj = gettype($res);
    //     $_SERVER['REMOTE_ADDR'] = "::1";
    //     $this->assertContains("object", $testObj);
    // }

    // public function testExternalInfo()
    // {
    //     $res = $this->controller->externalInfoAction();
    //     $testObj = gettype($res);
    //
    //     $this->assertContains("object", $testObj);
    // }



    public function testvalidateipActionGet()
    {

        $res = $this->controller->validateLocalActionGet("712313313");
        $resArray = json_decode($res[0]);
        $this->assertContains("Invalid IP", $resArray->Type);


        $res = $this->controller->validateLocalActionGet("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");
        $resArray = json_decode($res[0]);
        $this->assertContains("Valid IPv6", $resArray->Type);


        $res = $this->controller->validateLocalActionGet("74.125.224.72");
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
