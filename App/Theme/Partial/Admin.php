<?php
  $dataUrl = [
        "item" => [
            [
                "requestUrl" => $request["url"],
                "name" => 'Retour aux site',
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
                "name" => 'Category edit',
                "url" => "admin/category/edit",
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
                "name" => 'Posts edit',
                "url" => "admin/news/edit",
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
                "name" => 'Actualite',
                "url" => "admin/news/index",
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

