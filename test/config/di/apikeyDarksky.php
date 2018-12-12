<?php
/**
 * Configuration file for DI container.
 */
 return [
     "services" => [
         "apikeyDarkSky" => [
             "shared" => true,
             "callback" => function () {
                 $dirs = "7a8506da4d799f5eb16c13da8d0e55c6";
                 return $dirs;
             },
         ],
     ],
 ];
