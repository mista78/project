<?php

	function GetMethod (string $path,string $filename = 'Controller') :array
	{
		$data = [];
		$file = APP . 'Module'. DS . ucfirst($path) . DS .'Controller'. DS .ucfirst($filename).'.php';
		if (file_exists($file))
		{
			$file = file_get_contents($file);
			preg_match_all('/function ([\w]+)/',$file,$matches);
			foreach ($matches[1] as $key => $value) {
				$data[] = $value;
			}

		}
		return $data;
	}