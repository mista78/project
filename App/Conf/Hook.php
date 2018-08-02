<?php 
global $request,$route,$rended,$conf,$d;
if (isset($request['prefix'])) {
    $request['request']['action'] = $request['prefix'].'_'.$request['request']['action'];
    if ($request['prefix'] == "admin") {
        if (isset($_SESSION['User']) && $_SESSION['User']['rang'] >= 3) {
            config('tmp','admin');
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