<?php

function Truncate($text, $data = [])
{

    $data['size'] = (isset($data['size'])) ? $data['size'] : 35;
    $data['param'] = (isset($data['param'])) ? $data['param'] : null;
    $data['more'] = (isset($data['more']) && gettype($data['more']) === 'object') ? call_user_func($data['more'], $data['param']) : '...';
    $text_length = strlen($text);

    if ($text_length >= $data['size']) {
        $html = strip_tags(substr($text, 0, $data['size'])) . ' '. $data['more'];
    } else {
        $html = strip_tags($text);
    }

    return $html;
}
