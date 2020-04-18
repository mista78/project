<?php
	
	/**
	 * @Route(cates, category/index)
	 */
	function index() {
		
	}

	

	/**
	 * @Prefix(cockpit, admin)
	 * @Route(cateaddit, cockpit/category/edit)
	 * @Route(cateaddit/:id, cockpit/category/edit/id:([0-9]+))
	 */
	function admin_edit($id = null) {
		if($id === null) {
			$post = FindFirst([
				"table" => "category",
				"conditions" => ["online" => -1]
			]);
			if(!empty($post)) {
				$id = $post["id"];
			} else {
				$id = Save([
					"table" => "category",
					"data" => [
						"online" => "-1"
					]
				]);
			}
		}
		if(isset($_POST['name'])) {
			extract($_POST);
			$data = [];
			$data["name"] = $name;
			$data["online"] = (isset($online)) ? $online : 0;
			$data["slug"] = (!empty($slug)) ? $slug : Slug($name);
			if(is_integer(intval($id))) {
				$data["id"] = $id;
			}
			$lastId = Save(["table" => "category", "data" => $data]);
			if($lastId > 0) {
				Redirection("cockpit/news/index");
			}
		}

		if($id !== null) {
			$_POST = FindFirst([
				"table" => "category",
				"conditions"	=> [
					"id" => $id
				]
			]);
		}
	}


	/**
	 * @Route(cateaddelete/:id, cockpit/category/delete/id:([0-9]+))
	 */
	function admin_delete($id = null) {
		if($id !== null) {
			Delete(["table" => "category", "id" => $id]);
			Redirection("cockpit/news/index");
			die();
		}
	}