<?php

function createToken() {
    if(!isset($_SESSION['csrf'])){
        $_SESSION['csrf'] = md5(time() + rand());
    }
}

function csrf($arg = "?"){
    createToken();
    return $arg . 'csrf=' . $_SESSION['csrf'];
}

function csrfInput(){
    createToken();
    $_POST['csrf'] = $_SESSION['csrf'];
    return input('csrf' , null , ['type' => 'hidden']);
}

function checkCsrf($path = null){
    if(
        (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
        (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
    ){
        unset($_SESSION['csrf']);
        return true;
    }
    redirection($path);
}