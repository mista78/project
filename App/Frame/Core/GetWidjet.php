<?php

	function getWidjet($file, $items) {
	    extract(json_decode(json_encode($items), true));
	    $file = APP . "Component" . DS .  ucfirst($file) . DS .  "index.php";
	    ob_start();
	    if(file_exists($file)) {
	    	require $file;
	    }
	    $dataWIdjet = ob_get_clean();
	    return $dataWIdjet;
	}