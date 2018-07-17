<?php 

	
	function Debug ($vars)
	{
		echo "<pre>";
			print_r($vars);
		echo "</pre>";
	}
	
	function fa ($font = []) {
	    $font['type']   = isset($font['type']) ? $font['type'] : 'fas';
	    $fw             = ($font['type'] === 'fas' || $font['type'] === 'far') ? substr($font['type'],0,2) : $font['type'];
	    return '<i class="'. $font['type'] .' ' .$fw . '-'. $font['name'] .'"></i>';
	}
