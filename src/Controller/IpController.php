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




    public function validateipActionGet($ip)
    {

        $ipInfo = [];
        // preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/',
        // $value, $matches, PREG_OFFSET_CAPTURE);
        // // print_r($matches);
        // if ($matches) {
        //   array_push("Valid ip" : "Yes");
        // }
        // else {
        //   array_push("Valid ip" : "No");
        // }
        $ipInfo["IP"] = $ip;

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $ipInfo["Type"] = "Valid IPv4";
            $ipInfo["Domain"] = gethostbyaddr($ip);
            $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
            return $ipInfoJson;
        } else {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $ipInfo["Type"] = "Valid IPv6";
                $ipInfo["Domain"] = gethostbyaddr($ip);
                $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
                return $ipInfoJson;
            }
        }
        $ipInfo["Type"] = "Invalid IP";
        $ipInfo["Domain"] = "None";
        $ipInfoJson = json_encode($ipInfo, JSON_PRETTY_PRINT);
        return $ipInfoJson;
    }
}
