<?php 
	if(session_status() == PHP_SESSION_NONE){
	    session_start();
	}
	session_regenerate_id();
	date_default_timezone_set("Europe/Paris");
	define('_DIR_', dirname(__DIR__));
	const DS 			= DIRECTORY_SEPARATOR;
	const ROOT 			= _DIR_ . DS;
	const APP 			= ROOT . 'App' . DS;
	const WEB 			= ROOT . 'Public' . DS;
	const WEBROOT		= '/';
	
	require_once APP 	. "Conf". DS ."Route.php";
	require_once APP 	. "Frame". DS ."Loader.php";
	require_once APP 	. "Frame". DS ."Core". DS ."Devlie.php";

	Devlie();