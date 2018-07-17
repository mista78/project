<?php 


function login() {
	if(isset($_POST['pseudo'])) {

		$user = findFirst(array(
			"conditions" => array("pseudo" => $_POST['pseudo']),	
		));

		if(password_verify($_POST['password'], $user['password'])) {

			$_SESSION['User'] = $user;
			if ($_SESSION['User']) {
				redirection('dashboard');
			}
			setFlash("Bienvenue " . $_SESSION['User']['pseudo']);
		} else {

			redirection('users/login');

		}
	}
	if(isLogged('User','rang')){
		if(read('User','rang') >= 3){
			redirection('dashboard');
		}else{
			redirection();
		}
	}
}


function admin_index ()
{	
	$d['users'] = find();
	return $d;
}


function admin_edit($id = null) {
	if (isset($_POST['pseudo'])) {
		checkCsrf();
		unset($_POST['csrf']);
		$status = Save();
		if ($status != 0) {
			redirection('devlife/users/index');
		}
	} else {
		if ($id != null) {
			$_POST = FindFirst([
				'conditions' => ['id' => $id]
			],PDO::FETCH_ASSOC);
		}
	}
}

function register(){
	global $validates;
	if (isset($_POST['pseudo'])) {
		$_POST['pseudo2'] = $_POST['pseudo'];
		$validates = array(
			'pseudo2' => array(
				'rule' => 'match',
				'regex' => '([a-zA-z 0-9\-]+)',
				'message' => "Votre pseudo n'est pas correct"
			),
			'pseudo' => array(
				'rule' => 'exist',
				'message' => 'Votre pseudo est deja pris'
			),
			'password' => array(
				'rule' => 'same',
				'value' => 'password2',
				'message' => 'Vos deux mot de passes ne correspondent pas'
			),
			'email' => array(
				'rule' => 'exist',
				'message' => 'Cet adresse mail existe deja'
			),
		);
		if (isValid($_POST['g-recaptcha-response']) === true) {
			unset($_POST['g-recaptcha-response']);
			if (validates($_POST,find(),'register')) {
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
				$_POST['created'] = date('Y-m-d H:i:s');
				$_POST = parsing(['unset' => ['password2','pseudo2']]);
				$save = Save();
				if ($save != 0) {
					setFlash("Votre compte a bien était enregistré");
					redirection();
				} else {
					redirection('users/register');
				}
			}
		}
	}
	if(isLogged('User','rang')){
		if(read('User','rang') >= 3){
			redirection('dashboard');
		}else{
			redirection();
		}
	}
}

function admin_delete($id) {
	checkCsrf();
	delete(['id' => $id]);
	redirection('devlife/users/index');
	return 0;
}


function logout() {
	unset($_SESSION['User']);
	redirection();
}
