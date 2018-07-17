<?php

	function admin_index ()
	{
		$d["data"] = [

	        [

		        [
		          "colors"  => "aqua",
		          "fa"      => "file-alt",
		          "data"    => FindCount(['table' => 'posts','conditions' => ['online' => 1]]),
		          "name"    => "Actualités"
		        ],

		        [
		          "colors"  => "green",
		          "fa"      => "comments",
		          "data"    => "325",
		          "name"    => "Sujets"
		        ],


		        [
		          "colors"  => "blue",
		          "fa"      => "comments",
		          "data"    => "325",
		          "name"    => "Sujets"
		        ],

		        [
		          "colors"  => "red",
		          "fa"      => "comments",
		          "data"    => "325",
		          "name"    => "Sujets"
		        ],

		        [
		          "colors"  => "teal",
		          "fa"      => "user",
		          "data"    => FindCount(['table' => 'users']),
		          "name"    => "Membres"
		        ],

		        [
		          "colors"  => "maroon",
		          "fa"      => "comments",
		          "data"    => FindCount(['table' => 'comments']),
		          "name"    => "Commentaires"
		        ],
	        ],



	    ];
	    return $d;
	}