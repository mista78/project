<?php  
	
	$layouts["sidebar"] = [];
	$layouts["content"] = [
		[
			"container" => true,
			"item" => [
				[
					"type" => "text",
					"title" => "Ajouter une catégorie"
				]
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
                                "label" => "Titre de la categories"
                            ],
                            [
                                "class" => ["col-md-8"],
                                "type" => "input",
                                "name" =>  "slug",
                                "label" => "Url de la categories"
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
	$file = (isset($request["prefix"])) ? ucfirst($request["prefix"]) : "Header";
	$header = require_once APP . "Theme/Partial/". $file .".php";
    $header["item"] = array_merge($header["item"],$layouts["sidebar"]);
    $layouts["sidebar"] = $header;
	return $layouts;