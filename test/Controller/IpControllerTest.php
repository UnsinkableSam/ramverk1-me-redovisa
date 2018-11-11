<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class IpControllerTest extends TestCase
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

      // View helpers uses the global $di so it needs its value
      $di = $this->di;

      // Setup the controller
      $this->controller = new IpController();
      $this->controller->setDI($this->di);
      //$this->controller->initialize();
  }



  public function testIndex() {
    $res = $this->controller->indexAction();
    $testObj = gettype($res);
    print_r($testObj);
    print_r(gettype($testObj));
    $this->assertContains("object", $testObj);


  }



    public function testvalidateipActionGet () {


          $controller = new IpController();
          $object = $controller->validateipActionGet("2001:0db8:85a3:08d3:1319:8a2e:0370:7334");
          $object = json_decode($object, true);
          print_r($object["IP"]);
          $this->assertContains("Valid IPv6", $object["Type"]);


          $object = $controller->validateipActionGet("192.168.1.1");
          $object = json_decode($object, true);


          $this->assertContains("Valid IPv4", $object["Type"]);



          $object = $controller->validateipActionGet("192.168.1.1111");
          $object = json_decode($object, true);
          print_r($object["Type"]);

          $this->assertContains("Invalid IP", $object["Type"]);

    }

}
