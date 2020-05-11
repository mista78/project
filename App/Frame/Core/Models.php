<?php


	function Find ($req = [])
	{
		global $db,$request;
    	$req['table']= (isset($req['table'])) ? $req['table'] : strtolower($request['request']['controller']);
    	$req['style']= (isset($req['style'])) ? $req['style'] : PDO::FETCH_ASSOC;
	    $cond = [];
        $d = [];
	    $sql = 'SELECT ';
        if (isset($req['fields'])) {
            if (is_array($req['fields'])) {
                $sql .= implode(', ', $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
        } else {
            $sql .= '*';
        }
        $sql .= ' FROM '.$req['table']. ' ';

        if (isset($req['join'])) {
            foreach ($req['join'] as $k => $v) {
                $sql .= 'LEFT JOIN '. $k . ' ON '.$v.' ';
            }
        }
        if (isset($req['conditions'])) {
            $sql .= "WHERE ";

            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                
                if (isset($req['conditions']['like'])) {
                    if (is_array($req['conditions']['like'])) {
                        foreach ($req['conditions']['like'] as $k => $v) {
                            if (is_array($v)) {
                                $v = implode(' ', $v);
                            }
                            $sql .= "CONCAT({$k}) LIKE '%{$v}%' ";
                        }
                    } else {
                        $sql .= $req['conditions']['like'];
                    }
                    
                }
                if (isset($req['conditions']['like']) && is_array($req['conditions'])) {
                    $sql .= " AND";
                    unset($req['conditions']['like']);
                }
                foreach ($req['conditions'] as $k => $v) {

                    if (!is_numeric($v)) {
                        $v = addslashes($v);
                    }
                    $k2 = str_replace($req['table'] . '.','',$k);
                    $cond[]     = " $k=:$k2 ";
                    $d[":$k2"]   = $v;
                }
                $sql .= implode(' AND ', $cond);
                $like  = explode(' ',$sql);
                $count = count($like);
                if ($like[$count - 1] === "AND") {
                    unset($like[$count - 1]);
                    $sql = implode(' ', $like);
                } else {
                    $sql = $sql;
                }
            }
        }
        if (isset($req['order'])) {
            $sql .= ' ORDER BY '. $req['order'];
        }
        if (isset($req['limit'])) {
            $sql .= ' LIMIT '. $req['limit'];
        }
        $pre = $db->prepare($sql);
        $pre->execute($d);
        return $pre->fetchAll($req['style']);
    }

    function FindSerialize($req = []) {
        $data = find($req);
        $d = [];
        foreach ($data as $key => $value) {
            $d[] = unserialize($value['value']);
        }
        return $d;
    }

    function FindFirstSerialize($req) {
        $d = unserialize(findFirst($req)['value']);
        return $d;
    }


    function FindFirst($req, $style = null)
    {
        return current(Find($req));
    }

    function FindLike($req)
    {   
        global $request;
        if (!isset($req['fields'])) {
            $req['fields'] = '*';
        }
        $req['table']= (isset($req['table'])) ? $req['table'] : strtolower($request['request']['controller']);
        $data = Find([
            'table'      => $req['table'],
            'fields' => $req['fields'],
            'conditions' => "CONCAT(".implode(',', $req['champs']).") LIKE '%".$req['like']."%'",
        ]);
        return $data;
    }

    function FindCount($req = [])
    {
        global $request;
        $cond = '';
        $req['table']= (isset($req['table'])) ? $req['table'] : strtolower($request['request']['controller']);
        if (!isset($req['conditions'])) {
            $req['conditions'] = "1=1";
        }
        if (!isset($req['key'])) {
            $req['key'] = 'id';
        }
        $res = FindFirst([
            'table' => $req['table'],
            'fields' => 'COUNT('.$req['key'].') AS count',
            'conditions' => $req['conditions']
        ]);
        return $res['count'];
    }


    function FindList($req = [])
    {

        if (!isset($req['key'])) {
            $req['key'] = "id";
        }
        if (!isset($req['fields'])) {
            $req['fields'] = $req['key'] . ', name';
        }

        $d = Find($req);
        $r = [];
        foreach ($d as $k => $v) {
            $r[current($v)] = next($v);
        }

        return $r;
    }


    function Save($req = [])
    {
        global $db,$request;
        $key = isset($req['key']) ? $req['key'] : 'id';
        $req['data'] = (isset($req['data'])) ? $req['data'] : $_POST;
        $req['table']= (isset($req['table'])) ? $req['table'] : strtolower($request['request']['controller']);
        $fields =  array();
        $d = array();
        foreach ($req['data'] as $k => $v) {
            if ($k!=$key) {
                $fields[] = "$k=:$k";
                $d[":$k"] = $v;
            } elseif (!empty($v)) {
                $d[":$k"] = $v;
            }
        }

        if (isset($req['data'][$key]) && !empty($req['data'][$key]) && $req['data'][$key] != 0) {
            $sql = 'UPDATE '.$req['table'].' SET '.implode(',', $fields).' WHERE '.$key.'=:'.$key;
            $id = $req['data'][$key];
            $action = 'updated';
        } else {
            $sql = 'INSERT INTO '.$req['table'].' SET '.implode(',', $fields);
            $action = 'insert';
        }
        $pre = $db->prepare($sql);
        $pre->execute($d);

        if ($action != 'updated') {
            return $db->lastInsertId();
        } else {
            return $id;
        }
    }

    function Delete($req)
    {

        global $db,$request;
        if (!isset($req['key'])) {
            $req['key'] = 'id';
        }
        $req['table']= (isset($req['table'])) ? $req['table'] : strtolower($request['request']['controller']);
        if (isset($req['cond'])) {
          $sql = "DELETE FROM {$req['table']} WHERE {$req['cond']} ";
        } else {
          $sql = "DELETE FROM {$req['table']} WHERE {$req['key']}={$req['id']} ";
        }
        $db->query($sql);
        
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