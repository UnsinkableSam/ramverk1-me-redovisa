<?php
/**
 * Configuration file for DI container.
 */



return [
    "services" => [
        "validate" => [
            "shared" => true,
            "callback" => function () {
                $validate = new \Anax\IpValidators\IpValidator();
                return $validate;
            },
        ],
    ],
];
