<?php  
	require_once APP . 'Frame/Core/Router.php';
	require_once APP . 'Frame/Core/Models.php';
	require_once APP . 'Dep/Connect.php';
	if (file_exists(APP . 'Dep/Database.php')) {
		$data = require_once APP . 'Dep/Database.php';
	} else {
		$data = null;
	}
	Connect();
	Prefix('prefix', 'admin');
	// get('', 'home');

?>