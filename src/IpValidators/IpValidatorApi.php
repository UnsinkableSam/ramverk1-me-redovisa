<?php

namespace Anax\IpValidators;



class IpValidatorApi
{




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



    public function validateipActionGet($ip = null) : array
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




public function validateipActionPost($ip = null) : array
{
    if ($this->di->request->getPost("ip")) {
      $ipInfo["IP"] = $this->di->request->getPost("ip");
      $ip = $this->di->request->getPost("ip");
    } else {
      $ipInfo["IP"] = $ip;
    }

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

}





}
