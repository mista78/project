<?php

	$layouts["sidebar"] = [];
	$layouts["content"] = [
		[
			"container" => true,
			"item" => [
				[
                    "type" => "text",
                    "title" => "Actualite"
                ],
                
			]
		],
		[
			"container" => true,
			"item" => [
				[
                    "type" => "tableadmin",
                    "title" => "Categories",
                    "thead" => ["","Titre","Action"],
                    "url"   => "admin/category/",
                    "data" => Find(["table" => "category" , "conditions" => "online > -1", "order" => "created desc"])
                ],
                [
					"class" => ["span-2"],
                    "type" => "tableadmin",
                    "title" => "Actualite",
                    "thead" => ["","Titre","Created","Action"],
                    "url"   => "admin/news/",
                    "data" => Find(["table" => "news", "conditions" => "online > -1", "order" => "created desc"])
                ]
                
			]
		],
		[
			"container" => true,
			"item" => [
				[
                    "type" => "actues",
                    "text" 	=> [
                    	"title" => "Latest Articles",
                    	"class" => ["pb-8", "ta-c"],
                    ],
                    "data" => Find(["table" => "news", "conditions" => "online > 0 ", "order" => "created desc"])
                ],
			]
		],
	];
	$header = require_once APP . "Theme/Partial/Admin.php";
    $header["item"] = array_merge($header["item"],$layouts["sidebar"]);
    $layouts["sidebar"] = $header;
	return $layouts;