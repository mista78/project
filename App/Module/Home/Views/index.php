<?php  
	
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
	return $layouts;