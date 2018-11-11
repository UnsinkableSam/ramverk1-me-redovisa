<?php

use Anax\Route\Exception\ForbiddenException;
use Anax\Route\Exception\InternalErrorException;
use Anax\Route\Exception\NotFoundException;

/**
 * Routes to ease testing.
 */
return [
    // Path where to mount the routes, is added to each route path.


    // All routes in order
    "routes" => [
        [
            "info" => "Ip validator",
            "mount" => "ip-validator",
            "handler" => "\Anax\Controller\IpController",

        ],
        [
            "info" => "Ip validator Post",
            "mount" => "IpJsonController",
            "handler" => "\Anax\Controller\IpJsonController",

        ],

    ]
];
