<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample JSON controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 */
class IpJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    private $db = "not active";



        /**
         * This is the index method action, it handles:
         * ANY METHOD mountpoint
         * ANY METHOD mountpoint/
         * ANY METHOD mountpoint/index
         *
         * @return string
         */
    public function indexAction() : object
    {


          $title = " | Ip Json API";



          $page = $this->di->get("page");
          $page->add(
              "anax/v2/ip-validator/ipApi",
              [
                  "header" => "hello",
                  "text" => "text",
              ]
          );


          return $page->render([
              "title" => "hello"
          ]);
    }



    public function validateipActionGet($ip) : array
    {
        $ipInfo["IP"] = $ip;

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipInfo["Type"] = "Valid IPv4";
            $ipInfo["Domain"] = gethostbyaddr($ip);
            $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
            return [$ipInfoJson];
        } else {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $ipInfo["Type"] = "Valid IPv6";
                $ipInfo["Domain"] = gethostbyaddr($ip);
                $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
                return [$ipInfoJson];
            }
        }
        $ipInfo["Type"] = "Invalid IP";
        $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
        return [$ipInfoJson];

        // $json = [
        //     "ip" => "$value",
        // ];
        // return [$json];
    }




public function validateipActionPost($ip) : array
{
    $ipInfo["IP"] = $ip;

    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $ipInfo["Type"] = "Valid IPv4";
        $ipInfo["Domain"] = gethostbyaddr($ip);
        $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
        return [$ipInfoJson];
    } else {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipInfo["Type"] = "Valid IPv6";
            $ipInfo["Domain"] = gethostbyaddr($ip);
            $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
            return [$ipInfoJson];
        }
    }
    $ipInfo["Type"] = "Invalid IP";
    $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
    return [$ipInfoJson];

    // $json = [
    //     "ip" => "$value",
    // ];
    // return [$json];
}




public function testipActionGet($ip) : string
{
    return "hello" . $ip->$ip;


    // $json = [
    //     "ip" => "$value",
    // ];
    // return [$json];
}
}
