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
	config('mtn',0);
	$maintenance = FindFirst(['table' => 'config']);
	$maintenance = unserialize($maintenance['value']);
	config('dirname', ROOT . 'tmp');
	config('duration', $maintenance['cache'] ?? 10);
	config('config',$maintenance);
	$keys = require_once APP . 'Dep/Keys.php';
	config('recaptcha',$keys);
	Prefix('devlife', 'admin');
	if ($maintenance['maintenance'] == 1) {
		config('mtn',1);
		if (isset($_SESSION['User']) && $_SESSION['User']['rang'] >= 3) {
           GetUrl("","devlife/gestion/index");
		   
        } else {
            GetUrl("","maintenance");
        }
		GetUrl("login",'users/login');
		GetUrl((((isset($maintenance['dash']) && !empty($maintenance['dash'])) ? $maintenance['dash'] : null) ?? "dashboard"),"devlife/gestion/index");
	} else {
		GetUrl("",$maintenance['default']);
		GetUrl("register",'users/register');
		GetUrl("login",'users/login');
		GetUrl((((isset($maintenance['dash']) && !empty($maintenance['dash'])) ? $maintenance['dash'] : null) ?? "dashboard"),"devlife/gestion/index");
		GetUrl("devlife/categories/edit","devlife/posts/editCat");
		GetUrl("devlife/categories/edit/:id","devlife/posts/editCat/id:([0-9]+)");
	}
	if (isset($maintenance['tmp']) && $maintenance['tmp'] != null && !empty($maintenance['tmp'])) {
		Config('tmp',$maintenance['tmp']);
	}
	GetUrl("devlife/config","devlife/maintenance/edit");

?>