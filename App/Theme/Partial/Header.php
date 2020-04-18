<?php
  $dataUrl = [
        "item" => [
            [
                "requestUrl" => $request["url"],
                "name" => 'Home',
                "url" => " ",
               /*"section" => [
                    "item" =>  [
                        [
                            "name" => "posts",
                            "url" => "/", 

                            // "section" => [
                            //     "item" =>  [
                            //         [
                            //             "name" => "posts",
                            //             "url" => "/"  
                            //         ]
                            //     ]
                            // ] 
                        ],
                        [
                            "name" => "sub posts",
                            "url" => "/", 

                            "section" => [
                                "item" =>  [
                                    [
                                        "name" => "sub sub posts",
                                        "url" => "/"  
                                    ],
                                    [
                                        "name" => "sub sub posts",
                                        "url" => "/"  
                                    ]
                                ]
                            ] 
                        ],
                    ]
                ]*/
            ],
            [
              "requestUrl" => $request["url"],
                "name" => 'Blog',
                "url" => "blog",
               // "section" => [
               //      "item" =>  [
               //          [
               //              "name" => "posts",
               //              "url" => "cockpit/home/index"  
               //          ]
               //      ]
               //  ]
            ],
            [
              "requestUrl" => $request["url"],
                "name" => 'Forum',
                "url" => "",
               // "section" => [
               //      "item" =>  [
               //          [
               //              "name" => "posts",
               //              "url" => "cockpit/home/index"  
               //          ]
               //      ]
               //  ]
            ],
        ]           
    ];
	return $dataUrl;

