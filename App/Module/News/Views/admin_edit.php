<?php

	$layouts["sidebar"] = [];
	$layouts["content"] = [
        [
            "container" => true,
            "item" => [
                [
                    "type" => "text",
                    "title" => "Ajouter un actualite"
                ],
                
            ]
        ],
		[
			"container" => true,
			"item" => [
				[
                    "type" => "form",
                    "form" => [
                        [
                            [
                                "class" => ["col-md-4"],
                                "type" => "input",
                                "name" =>  "name",
                                "label" => "Titre de contenue"
                            ],
                            [
                                "class" => ["col-md-8"],
                                "type" => "input",
                                "name" =>  "slug",
                                "label" => "Url de contenue"
                            ]
                        ],
                        [
                            [
                                "class" => ["col-md-4"],
                                "type" => "input",
                                "name" => "file",
                                "options" => ["type" => "file"],
                                "label" => "Banner "
                            ],
                            [
                                "class" => ["col-md-4"],
                                "type" => "input",
                                "name" => "created",
                                "label" => "Datepicker",
                                "options" => [
                                	"class" => "datepicker",
                                    "surrond" => [
                                        "type" => "div",
                                        "class" => "Datepicker"
                                    ]
                                ]
                            ],
                            [
                                "class" => ["col-md-4"],
                                "type" => "select",
                                "name" => "id_category",
                                "label" => "Categories",
                                "options" => [
                                    "options" => FindList(["table" => "category", "conditions" => "online > 0"])
                                ]
                            ]
                        ],
                        [
                            [
                                "type" => "textarea",
                                "name" => "resume",
                                "label" => "Description "
                            ]
                        ],
                        [
                            [
                                "type" => "textarea",
                                "name" => "content",
                                "label" => "Contenue "
                            ]
                        ],
                        [
                            [
                                "type" => "checkbox",
                                "name" => "online",
                                "options" => ["message" => "Online "]
                            ]
                        ],
                    ]
                ],
                
			]
		]
	];

	$header = require_once APP . "Theme/Partial/Admin.php";
    $header["item"] = array_merge($header["item"],$layouts["sidebar"]);
    $layouts["sidebar"] = $header;
	return $layouts;