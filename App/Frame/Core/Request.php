<?php

	function Request ()
	{
		
		$request = [];

		$request['url'] = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'/';

		return $request;
	}