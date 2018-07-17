<?php

function validates($data, $bdd = null, $path = '')
{
    global $validates;
    $errors = [];
    foreach ($validates as $k => $v) {
        if (!isset($data[$k])) {
            $errors[$k] = $v['message'];
        } else {
            if ($v['rule'] === 'notEmpty') {
                if (empty($data[$k])) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'match') {
                if (!preg_match('/^'.$v['regex'].'$/', $data[$k])) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'minSize') {
                if (strlen($data[$k]) <= $v['size']) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'maxSize') {
                if (strlen($data[$k]) > $v['size']) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'same') {
                $d = $v['value'];
                if ($data[$k] !== $data[$d]) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'code') {
                if ($data[$k] !== $_SESSION[$k]) {
                    $errors[$k] = $v['message'];
                }
            } elseif ($v['rule'] === 'exist') {
                foreach ($bdd as $key => $value) {
                    if (strtolower($data[$k]) === strtolower($value[$k])) {
                        $errors[$k] = $v['message'];
                    }
                }
            }
        }
    }
    if (empty($errors)) {
        return true;
    }
    foreach ($errors as $key => $value) {
        setFlash($value, 'danger', $value);
    }
    redirection($path);
}