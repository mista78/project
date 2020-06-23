<?php

function stylesCaptcha($options, $exception = [])
{
    $i = 0;
    $labelAttr = "";
    foreach ($options as $k => $v) {
        if (!in_array($k, $exception)) {
            $labelAttr .= "$k:$v; ";
        }
    }
    return $labelAttr;
}

function image($string, $data = [])
{
    $largeur = (isset($data['l'])) ? $data['l'] : strlen($string) * 10;
    $hauteur = (isset($data['h'])) ? $data['h'] : 20;
    $img = imagecreate($largeur, $hauteur);
    $blanc = imagecolorallocate($img, 255, 255, 255);
    $noir = (isset($data['c'])) ? imagecolorallocate($img, $data['c']['r'], $data['c']['g'], $data['c']['b']) : imagecolorallocate($img, 0, 0, 0);
    imagecolortransparent($img, $blanc);
    $milieuHauteur = ($hauteur / 2) - 8;
    imagestring($img, 6, strlen($string) / 2, $milieuHauteur, $string, $noir);
    imagepng($img);
    imagedestroy($img);
}

function codeGenerate($options)
{
    $data = [];
    foreach ($options['str'] as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key => $val) {
                array_push($data, $val);
            }
        } else {
            array_push($data, $value);
        }
    }
    $nl = count($data) - 1;
    $string = $options['hsh'] . '';
    for ($i = 0; $i < $options['num']; ++$i) {
        $string .= $data[mt_rand(0, $nl)];
    }
    return $string;
}

function captcha($options = [])
{

    $options['typ'] = isset($options['typ']) ? $options['typ'] : "text";
    $options['atr'] = isset($options['atr']) ? $options['atr'] : [];
    $options['num'] = isset($options['num']) ? $options['num'] : 6;
    $options['str'] = isset($options['str']) ? $options['str'] : range('0', '9');
    $options['hsh'] = isset($options['hsh']) ? $options['hsh'] : null;
    $options['cod'] = isset($options['cod']) ? $options['cod'] : 'captcha';
    $string = codeGenerate($options);
    $attr = stylesCaptcha($options['atr']);
    $_SESSION[$options['cod']] = $string;
    if ($options['typ'] == "image") {
        image($string);
    } else {
        $html = "<span style='$attr'> {$string} </span>";
        return $html;
    }
}
