<?php 

    function Debug ($state) 
    {
        $debug = debug_backtrace(); 
        echo "<pre> <code>";
		foreach($debug as $k=>$v){
			echo '<div><strong>'.$v['file'].' </strong> l.'.$v['line'].'</div>'; 
		}
        print_r($state);
        echo "</code> </pre>";
    }
    
	
	function fa ($font = []) {
	    $font['type']   = isset($font['type']) ? $font['type'] : 'fas';
	    $fw             = ($font['type'] === 'fas' || $font['type'] === 'far') ? substr($font['type'],0,2) : $font['type'];
	    return '<i class="'. $font['type'] .' ' .$fw . '-'. $font['name'] .'"></i>';
	}
