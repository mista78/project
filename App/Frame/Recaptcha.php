<?php 

function isHtml() {
    global $conf;
    return '<div class="g-recaptcha" data-sitekey="' . @$conf['recaptcha']['site'] . '"></div>';
}

function isValid($code, $ip = null)
{
    global $conf;
    if (empty($code)) {
        return false; // Si aucun code n'est entré, on ne cherche pas plus loin
    }
    $params = [
        'secret'    => $conf['recaptcha']['secret'],
        'response'  => $code
    ];
    if( $ip ){
        $params['remoteip'] = $ip;
    }
    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
   
    $response = file_get_contents($url);

    if (empty($response) || is_null($response)) {
        return false;
    }

    $json = json_decode($response);
    return $json->success;
}