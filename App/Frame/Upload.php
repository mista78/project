<?php

function Upload($options = [])
{
    $options['index']  = isset($options['index']) ? $options['index'] : 'file';
    $options['path']   = isset($options['path']) ? $options['path'] . '/' : 'Public/img/';
    $options['name']   = isset($options['name']) ? $options['name'] : null;
    if (!file_exists(ROOT . $options['path'])) {
        mkdir(ROOT . $options['path']);
        return move($options);
    } else {
        return move($options);
    }
}

function move($options)
{
    if (isset($_FILES[$options['index']]) && $_FILES[$options['index']] != '') {
        $file      = explode('.', $_FILES[$options['index']]['name']);
        $extension = pathinfo($_FILES[$options['index']]['name'], PATHINFO_EXTENSION);
        if ($options['name'] != null) {
            $image     = Slug($options['name']) .  '.' . $extension;
        } else {
            $image     = Slug($file[0]) .  '.' . $extension;
        }
        $chemin    = ROOT . $options['path'] . $image;
        $verif     = ['jpg','png','gif','jpeg','JPG','PNG','GIF','JPEG'];
        if (in_array($extension, $verif)) {
            if (move_uploaded_file($_FILES[$options['index']]['tmp_name'], $chemin)) {
                return $image;
            }
        }
    } else {
        return false;
    }
}
