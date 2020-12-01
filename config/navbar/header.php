<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                    [
                        "text" => "Kmom03",
                        "url" => "redovisning/kmom03",
                        "title" => "Redovisning för kmom03.",
                    ],

                    [
                        "text" => "Kmom04",
                        "url" => "redovisning/kmom04",
                        "title" => "Redovisning för kmom04.",
                    ],
             
                    [
                        "text" => "Kmom05",
                        "url" => "redovisning/kmom05",
                        "title" => "Redovisning för kmom05.",
                    ],
                 
                    [
                        "text" => "Kmom06",
                        "url" => "redovisning/kmom06",
                        "title" => "Redovisning för kmom06.",
                    ],
                    [
                        "text" => "Kmom10",
                        "url" => "redovisning/kmom10",
                        "title" => "Redovisning för kmom10.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "kmom01",
            "url" => "InternalController",
            "title" => "kmom02",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Internal validate ip ",
                        "url" => "InternalController",
                        "title" => "Internal validate ip  ",
                    ],
                    [
                        "text" => "Internal api ip validator ",
                        "url" => "JsonController",
                        "title" => "Internal api ip validator ",
                    ],
                ],
            ],
        ],
        [
            "text" => "kmom02",
            "url" => "apiExternal",
            "title" => "kmom02",
            "submenu" => [
                "items" => [
                    [
                        "text" => "External Api",
                        "url" => "apiExternal",
                        "title" => "External Api ",
                    ],
                    [
                        "text" => "Rest External Api ",
                        "url" => "RestApiExternal",
                        "title" => "Rest External Api ",
                    ],
                ],
            ],
        ],
        [
            "text" => "kmom03",
            "url" => "darkSkyController",
            "title" => "kmom03",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Darksky api",
                        "url" => "darkSkyController",
                        "title" => "Darksky api",
                    ],
                    [
                        "text" => "Darksky api json",
                        "url" => "darkSkyController/indexJson",
                        "title" => "Darksky api json",
                    ],

                ],
            ],
        ],
        [
            "text" => "Books",
            "url" => "book",
            "title" => "Books",
        ],
    ],
];
