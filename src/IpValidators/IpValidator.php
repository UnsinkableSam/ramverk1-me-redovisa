<?php
namespace Anax\IpValidators;

 class IpValidator {


   public function validateipActionGet($ip)
   {

       $ipInfo = [];
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
