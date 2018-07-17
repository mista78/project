<?php 
global $request,$route,$rended,$conf,$d;
if (isset($request['prefix'])) {
    if ($request['prefix'] == "admin") {
        Config('tmp','admin');
        if (isset($_SESSION['User']) && $_SESSION['User']['rang'] >= 3) {
        } else {
            redirection();
        }
    } else {
        if (strpos($action, 'admin') === 0) {
            redirection();
        }
    }
    $request['prefix'] = [];
}
if ($request['request']['controller'] == 'Erreur') {
    Config('tmp','error');
}

if ($conf['mtn'] === 1) {
    if ($request['request']['action'] == "login") {
        Config('tmp','default');
    } else {
        if (isset($_SESSION['User']) && $_SESSION['User']['rang'] >= 3) {
            Config('tmp','admin');
        } else {
            Config('tmp','maint');
        }
    }
    if (isset($_SESSION['User']) && $_SESSION['User']['rang'] >= 3) {
    } else {
        if ($request['request']['controller'] == "Users") {
            Config('tmp','users');
        }
    }
}
