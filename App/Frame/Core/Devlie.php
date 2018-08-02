<?php

	function Devlie ($path = null)
	{
		global $request,$route,$rended,$d;
		Loader(['Frame','Dep']);
		$request 	= Request();
		$d 			= [];
		GetParser($request['url'],$request);

		loadController();
		
		if (isset($request['prefix'])) {
			$request['request']['action'] = $request['prefix'] .'_' . $request['request']['action'];
		}
		if (!in_array($request['request']['action'],GetMethod($request['request']['controller']))) {
			echo "cette action n'exists pas";
			die();
			// Redirection();
		}
		require_once APP . "Conf/Hook.php";
		$d = call_user_func_array($request['request']['action'], $request['request']['params']);
		if(is_null($d)) { $d = [];  }
		if($d === 0 ) { $rended = true;  }
		
		Render($request['request']['action']);
	}

	function loadController() 
	{
		global $request,$route,$rended,$d;
		$file = APP . 'Module/' . ucfirst($request['request']['controller']) . '/Controller/controller.php';
		if (file_exists($file)) {
			require_once $file; 
		} else {
			echo "ceux controlleur n'exists pas";
			die();
			// Redirection();
		}
	}

?>