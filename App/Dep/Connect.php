<?php 

function connect()
{

    global $db, $data,$conf;
    $data = $data;
    try {
        if (isset($conf['db'])) {
            $db = $conf['db'];
            return true;
        }
        $pdo = new PDO(
            'mysql:host='.$data['host'].';dbname='.$data['base'].';',
            $data['user'],
            $data['pass'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
        );
        $conf['db'] = $pdo;
        $db = $pdo;
    } catch (PDOException $e) {
        die('Erreur' . $e->getMessage());
    }
}

