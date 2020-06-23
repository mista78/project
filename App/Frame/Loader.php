<?php

function Loader($path)
{
    if (is_array($path)) {

        foreach ($path as $value) {

            Checked($value);

        }
    } else {

        Checked($path);
    }
}

function Checked($path = "Module")
{

    $test = glob(APP . $path . "/*");

    foreach ($test as $key => $value) {
        if (is_file($value)) {
            require_once $value;
        } else {
            Checked(str_replace(APP, '', $value));
        }
    }

}
