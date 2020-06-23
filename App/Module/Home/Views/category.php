<?php  
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
	return $layouts;