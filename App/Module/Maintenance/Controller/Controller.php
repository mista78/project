<?php 



function index() {

}

function admin_edit() {
		$data = FindFirst([
			'table' => 'config',
		],PDO::FETCH_ASSOC);
		$donne = unserialize($data['value']);
	if (isset($_POST['title'])) {
		checkCsrf();
		unset($_POST['csrf']);
		$_POST['img'] = Upload([
			'path' => 'Public/img/maint',
			'name' => 'maintenance'
 		]);
 		if (empty($_POST['img'])) {
 			$_POST['img'] = $donne['img'];
 		}
		$_POST['value'] = serialize(parsing());
		$_POST = unsets(['post' => $_POST,'exep' => ['value','id']]);
		$status = Save(['table' => 'config']);
		if ($status != 0) {
			redirection('devlife/gestion/index');
		}
	} else {
		$_POST = $donne;
	}

	$d['md6'] = ['tags' => 'p', 'class' => 'col-md-6'];
	$d['md12'] = ['tags' => 'p', 'class' => 'col-md-12'];
	return $d;
}