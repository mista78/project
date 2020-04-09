<?php

	function GetMethod (string $path,string $file, $index = 1) :array
	{
		$data = [];
		if (file_exists($file))
		{
			$file =  file_get_contents($file);
			preg_match_all('#'.$path.'#',$file,$matches);
			foreach ($matches[$index] as $key => $value) {
				$data[] = $value;
			}

		}
		return $data;
	}