<?php

/**
 * Function Render
 * @param $views STRING
 * @return bool
 */
function Render($views)
{
    global $request, $route, $rended, $conf, $d;
    if ($rended) {return false;}
    extract($d);
    if (strpos($views, '/') === 0) {
        $views = APP . 'Module' . $views . '.php';
    } else {
        $views = APP . 'Module' . DS . ucfirst($request['request']['controller']) . DS . 'Views' . DS . $views . '.php';
    }
    $view = require_once $views;
    $nameHeader = (isset($request["prefix"]) && $request["prefix"] === "admin") ? "Admin" : "Header";
    $nameIndex = (isset($request["prefix"]) && $request["prefix"] === "admin") ? "sidebar" : "header";
    $files = APP . "Theme/Partial/". $nameHeader .".php";
    if(file_exists($files)) {
        $view[$nameIndex] = [];
        $header = require_once $files;
        $header["item"] = array_merge($header["item"], $view[$nameIndex]);
        $view[$nameIndex] = $header;
    }
    $theme = APP . "Theme" . DS . ($conf['tmp'] ?? "default") . ".php";
    if (file_exists($theme)) {
        require $theme;
    } else {echo getWidjet("blockcontainer", $view);}
    $rended = true;
}
