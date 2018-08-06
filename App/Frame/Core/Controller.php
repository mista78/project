<?php

	/**
	 * Function Render
	 * @param $views STRING 
	 * @return bool
	 */
	function Render($views)
	{
		global $request,$route,$rended,$conf,$d;
		if ($rended) { return false; }
		extract($d);
		if(strpos($views,'/')===0){
			$views = APP . 'Module'  . $views .'.php';
		}else{
			$views = APP . 'Module'  . DS . ucfirst($request['request']['controller']) . DS . 'Views'. DS .  $views.'.php';
		}
		ob_start(); 
		require($views);
		$content = ob_get_clean();  
		$theme = APP . "Theme" . DS . ($conf['tmp'] ?? "default") .".php";
		if (file_exists($theme)) {
			require $theme;
		} else { echo $content; }
		$rended = true; 
	}