<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    public function indexAction() : object
    {
        $title = " | Ip validator";



        $page = $this->di->get("page");
        $page->add(
            "anax/v2/ip-validator/ipValidator",
            [
                "header" => "hello",
                "text" => "text",
            ]
        );


        return $page->render([
            "title" => "hello"
        ]);
    }







        public function validateipActionGet($ip = null) : array
        {

          print_r($this->di);
          //
          // if ($this->di->request->getGet("ip")) {
          //   $ipInfo["IP"] = $this->di->request->getGet("ip");
          //   $ip = $this->di->request->getGet("ip");
          // } else {
          //   $ipInfo["IP"] = $ip;
          // }
          $bob =  $this->di->get("validateApi");
          $res = $bob->validateipActionGet($ip);
          return $res;
        }

}
