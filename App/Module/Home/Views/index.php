<?php  
	
	$layouts["header"]  = [];
	$layouts["content"] = [
		[
			"container" => true,
			"item" => [
				[
                    "type" => "actues",
                    "class" => ["pt-10", "pb-10"],
                    "text" 	=> [
                    	"title" => "Latest Articles",
                    	"class" => ["pb-8", "ta-c"],
                    ],
                    "data" => Find(["table" => "news", "conditions" => "online > 0", "order" => "created desc"])
                ],
			]
		]
	];
	$header = require_once APP . "Theme/Partial/Header.php";
    $header["item"] = array_merge($header["item"],$layouts["header"]);
    $layouts["header"] = $header;
	return $layouts;