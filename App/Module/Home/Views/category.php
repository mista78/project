<?php  
	$layouts["header"] = [];
	$layouts["content"] = [
		[
			"container" => true,
			"item" => [
				[
					"type" => "text",
					"title" => "Project blog"
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
                                "label" => "Titre de contenue"
                            ],
                            [
                                "class" => ["col-md-8"],
                                "type" => "input",
                                "name" =>  "slug",
                                "label" => "Url de contenue"
                            ]
                        ]
                    ]
                ],
                
			]
		]
	];
	$header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
	return $layouts;