<?php


function index($id = null) {
	$cond = ['online' => 1];
	$d['posts'] = Find([
		'fields' => [
			'posts.*',
			'categories.name as catname, categories.color',
			'users.pseudo',
		],
		'join' => [
			'categories' => 'categories.id=posts.id_cat',
			'users' => 'users.id=posts.id_user',
		],
		'order' => 'created DESC',
		'conditions' => $cond
	]);
	$d['slider'] = array_slice($d['posts'],0 , 3);

	$data = [];
	$data['test'] = find(['conditions' => ['like' => ['name' => 'e'], "online" => 1]]); 
	// debug($data);
	return $d;
}


function post($slug = null) {
	if (!is_null($slug) and !is_numeric($slug)) {
		$d['post'] = FindFirst([
			'fields' => [
				'posts.*',
				'categories.name as catname',
				'users.pseudo',
			],
			'join' => [
				'categories' => 'categories.id=posts.id_cat',
				'users' => 'users.id=posts.id_user',
			],
			'conditions' => ['posts.slug' => $slug],
		]);

		$d['comments'] = Find([
			'table' => 'comments',
			'conditions' => ['post_id' => $d['post']['id']],
			'order' => 'id DESC',
			'style' => PDO::FETCH_OBJ
		]);
		$comments_by_id = [];
		foreach ($d['comments'] as $comment) {
			$comments_by_id[$comment->id] = $comment;
		}

		foreach ($d['comments'] as $k => $comment) {
			if ($comment->parent_id != 0) {
				$comments_by_id[$comment->parent_id]->children[] = $comment;
				unset($d['comments'][$k]);
			}
		}

		$_POST['post_id'] = $d['post']['id'];
	if ($d['post'] == '') {
			redirection();
		}
	} else {
		redirection();
	}
	return $d;
}

function comments() {

	if ($_POST['parent_id'] != 0  && $_POST['parent_id'] != '') {
		$com = Find([
			'table' => 'comments',
			'conditions' => ['id' => $_POST['parent_id']],
		]);
		$_POST['depth'] = $com->depth + 1;
	}
	if (isset($_POST['content']) &&  !empty($_POST['content'])) {
		checkCsrf();
		unset($_POST['csrf']);
		$_POST['user_id'] = $_SESSION['User']['id'];
		$id = Save(['table' => 'comments']);
		if ($id != 0) {
			$d['post'] = FindFirst([
				'conditions' => ['id' => $_POST['post_id']],
			]);
			redirection("posts/post/". $d['post']['slug']);
		}

	}
	return 0;
}

function admin_editCat($id = null) {
	if (isset($_POST['name'])) {
		$_POST['slug'] = Slug($_POST['name']);
		$status = Save(['table' => 'categories']);
		if ($status != 0) {
			redirection('devlife/posts/index');
		}
	} else {
		if ($id != null) {
			$_POST = FindFirst([
				'table' => 'categories',
				'conditions' => ['id' => $id]
			],PDO::FETCH_ASSOC);
		}
	}
}

function admin_index() {
	$d['posts'] = Find([
		'fields' => [
			'posts.*',
			'categories.name as catname',
			'users.pseudo',
		],
		'join' => [
			'categories' => 'categories.id=posts.id_cat',
			'users' => 'users.id=posts.id_user',
		],
		'order' => 'id DESC'
	]);
	return $d;
}

function admin_edit($id = null) {

	if($id === null){

		$post = FindFirst(array(
			'conditions' => array('online' => -1),
		));
		if(!empty($post)){
			$id = $post['id'];
		}else{
			$_POST = array(
				'online' => -1,
				'created' 	 => date('Y-m-d H:i')
			);
			$id = Save();
		}
	}
	$_POST['id'] = $id;

	$d['options'] = FindList([
		'table' => 'categories'
	]);
	if (isset($_POST['name'])) {
		checkCsrf();
		$_POST['slug'] = Slug($_POST['name']);
		$_POST['updated'] =  date('Y-m-d H:i');
		$_POST['id_user'] =  read('User','id');
		$_POST['img'] = Upload([
			'path' => 'Public/img/blog',
			'name' => $_POST['slug']
 		]);
 		if (empty($_POST['img'])) {
 			unset($_POST['img']);
 		}
 		unset($_POST['csrf']);
		$status = Save();
		if ($status != 0) {
			redirection('devlife/posts/index');
		}
	} else {
		$_POST = FindFirst([
			'conditions' => ['id' => $id]
		],PDO::FETCH_ASSOC);
	}
	return $d;
}

function admin_delete($table,$id) {
	checkCsrf();
	delete(['table' => $table,'id' => $id]);
	redirection('devlife/posts/index');
	return 0;
}
