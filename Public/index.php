<?php 
	if(session_status() == PHP_SESSION_NONE){
	    session_start();
	}
	session_regenerate_id();
	date_default_timezone_set("Europe/Paris");
	define('_DIR_', dirname(__DIR__));
	const DS 			= DIRECTORY_SEPARATOR;
	const ROOT 			= _DIR_ . DS;
	const APP 			= ROOT . 'App/';
	const WEBROOT		= '/';
	
	require_once APP 	. "Conf/Route.php";
	require_once APP 	. "Frame/Loader.php";
	require_once APP 	. "Frame/Core/Devlie.php";

	Devlie();