<?php

function write($key, $value)
{
    $_SESSION[$key] = $value;
}

function read()
{
    $nbArg = func_num_args();
    $data = func_get_args();
    if ($nbArg > 0 and $nbArg < 2) {
        if (isset($_SESSION[$data[0]])) {
            return $_SESSION[$data[0]];
        } else {
            return false;
        }
    } elseif ($nbArg > 1) {
        if (isset($_SESSION[$data[0]][$data[1]])) {
            return $_SESSION[$data[0]][$data[1]];
        } else {
            return false;
        }
    } else {
        return $_SESSION;
    }
}

function setFlash($message, $type = "success", $arg = '', $array = true)
{
    if ($array == true) {
        $_SESSION['flash'][] = [
            "message" => $message,
            "type" => $type,
        ];
    } else {
        $_SESSION['flash'] = [
            "message" => $message,
            "type" => $type,
        ];
    }
}

function Flash($size = 75)
{
    if (isset($_SESSION['flash'])) {
        $html = '';
        foreach ($_SESSION['flash'] as $key => $value) {
            if (is_array($value)) {
                $html .= '<div id="flash" data-size="' . $size . '" class="flash ' . $value['type'] . '">';
                $html .= '<div class="flash-group-addon"><i class="fa fa-fw fa-circle"></i></div>';
                $html .= ' <p class="flash-control" id="flash-control">' . $value['message'] . '</p>';

                $html .= '</div>';
            }
        }
        unset($_SESSION['flash']);
        return $html;
    }
}

function isLogged()
{
    $nbArg = func_num_args();
    $data = func_get_args();

    if ($nbArg > 1) {
        return isset($_SESSION[$data[0]][$data[1]]);
    } else {
        return isset($_SESSION[$data[0]]);
    }
}
