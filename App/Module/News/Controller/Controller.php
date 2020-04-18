<?php
	
	/**
	 * @Route(news, news/index)
	 */
	function index() {
		
	}

	

	/**
	 * @Prefix(cockpit, admin)
	 * @Route(newsadedit, cockpit/news/edit)
	 * @Route(newsadedit/:id, cockpit/news/edit/id:([0-9]+))
	 */
	function admin_edit($id = null) {
		if($id === null) {
			$post = FindFirst([
				"table" => "news",
				"conditions" => ["online" => -1]
			]);
			if(!empty($post)) {
				$id = $post["id"];
			} else {
				$id = Save([
					"table" => "news",
					"data" => [
						"online" => -1
					]
				]);
			}
		}
		if(isset($_POST['name'])) {
			extract($_POST);
			$data = [];
			$time = time();
			$data["name"] = $name;
			$img = Upload();
			if(!empty($img)) {
				$data["img"] = $img;
			}
			$data["resume"] = $resume;
			$data["content"] = $content;
			$data["created"] = strtotime($created);
			$data["updated"] = $time;
			$data["id_category"] = $id_category;
			$data["online"] = (isset($online)) ? $online : 0;
			$data["slug"] = (!empty($slug)) ? $slug : Slug($name);
			if(is_integer(intval($id))) {
				$data["id"] = $id;
			}
			$lastId = Save(["table" => "news", "data" => $data]);
			if($lastId > 0) {
				echo "succes";
				Redirection("cockpit/news/index");
			}
		}

		if($id !== null) {
			$_POST = FindFirst([
				"table" => "news",
				"conditions"	=> [
					"id" => $id
				]
			]);
			$_POST["created"] = (!empty($_POST["created"])) ? date("Y-m-d", $_POST["created"]) : date("Y-m-d");
		}
	}

	/**
	 * @Route(newsadindex, cockpit/news/index)
	 */
	function admin_index() {
		
	}


	/**
	 * @Route(newsaddelete/:id, cockpit/news/delete/id:([0-9]+))
	 */
	function admin_delete($id = null) {
		if($id !== null) {
			Delete(["table" => "news","id" => $id]);
			Redirection("cockpit/news/index");
			die();
		}
	}