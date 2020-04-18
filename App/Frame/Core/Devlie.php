<?php

	function Devlie ($path = null)
	{
		global $request,$route,$rended,$d;
		Loader(['Frame','Dep']);
		$request 	= Request();
		$d 			= [];
		$initRoute = glob(APP . "Module".DS."*".DS."Controller".DS."*");
		foreach ($initRoute as $key => $value) {
			$prefixes = GetMethod("@Prefix\((.*)\)",$value);
			foreach ($prefixes as $prkey => $pref) {
				$pref = explode(",", trim($pref));
				unset($prefixes[$prkey]);
				Prefix($pref[0], trim($pref[1]));
			}
			$routing = GetMethod("@Route\((.*)\)",$value);
			foreach ($routing as $rokey => $rotef) {
				$rotef = explode(",", trim($rotef));
				unset($routing[$rokey]);
				GetUrl($rotef[0], trim($rotef[1]));
			}
		}
		$genData 	= [];
		$Entities 	= glob(APP . "Entity" . DS. "*");
		foreach ($Entities as $key => $Entity) {
			$champsTable= strtolower(str_replace([APP . "Entity" . DS, ".php"], ["",""], $Entity));
			$champsType	= GetMethod('\* (.*)',$Entity);
			$champsName = GetMethod('\$(.*)',$Entity);
			foreach ($champsType as $k => $v) {
				$genData[$champsTable][strtolower(trim($champsName[$k]))] = strtolower(trim($v));
			}
		}
		genTable($genData);
		GetParser($request['url'],$request);
		loadController();
		if (isset($request['prefix'])) {
			$request['request']['action'] = $request['prefix'] .'_' . $request['request']['action'];
		}
		if (!in_array($request['request']['action'],GetMethod("function ([\w]+)",controllerFile($request['request']['controller'])))) {
			echo "cette action n'exists pas";
			die();
			// Redirection();
		}
		$hook =  APP . "Conf". DS ."Hook.php";
		if (file_exists($hook)) {
			require_once $hook;
		}
		$d = call_user_func_array($request['request']['action'], $request['request']['params']);
		if(is_null($d)) { $d = [];  }
		if($d === 0 ) { $rended = true;  }
		
		Render($request['request']['action']);
	}

	function controllerFile(string $text, $filename = "Controller") {
		return APP . 'Module'. DS . ucfirst($text) . DS .'Controller'. DS .ucfirst($filename).'.php';
	}

	function genTable($data = []) {
		global $key, $db;
		$sql = "";
		foreach ($data as $table => $champs) {
			$sql .= "CREATE TABLE IF NOT EXISTS `$table`(";
            $sql .= "`id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`)";
            $sql .= ");";
            $db->query($sql);
            foreach ($champs as $champ => $props) {
            	if(empty(@$db->query("SELECT $champ FROM $table"))) {
                    $sql .= " ALTER TABLE `$table` ADD COLUMN `$champ` $props NULL DEFAULT NULL AFTER `$key`; ";
                }
            	$key = $champ;
				foreach (@$db->query("SHOW COLUMNS FROM $table")->fetchAll(PDO::FETCH_ASSOC) as $dropkey => $dropValue) {
					if(!isset($champs[$dropValue["Field"]])) {
						$field = $dropValue["Field"];
                        $sql .= "ALTER TABLE `$table` DROP COLUMN `$field`;";
                    }
				}

            }
		}
		$db->query($sql);
	}
	function loadController() 
	{
		global $request,$route,$rended,$d;
		$file = APP . 'Module'. DS . ucfirst($request['request']['controller']) . DS .'Controller'. DS .'controller.php';
		if (file_exists($file)) {
			require_once $file; 
		} else {
			echo "ceux controlleur n'exists pas";
			die();
			// Redirection();
		}
	}

?>