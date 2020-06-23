<?php 

    function Utf8_ansi($valor='') {

        $utf8_ansi2 = array(
            "\u00c0" =>"À", // ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ
            "\u00c1" =>"Á",
            "\u00c2" =>"Â",
            "\u00c3" =>"Ã",
            "\u00c4" =>"Ä",
            "\u00c5" =>"Å",
            "\u00c6" =>"Æ",
            "\u00c7" =>"Ç",
            "\u00c8" =>"È",
            "\u00c9" =>"É",
            "\u00ca" =>"Ê",
            "\u00cb" =>"Ë",
            "\u00cc" =>"Ì",
            "\u00cd" =>"Í",
            "\u00ce" =>"Î",
            "\u00cf" =>"Ï",
            "\u00d1" =>"Ñ",
            "\u00d2" =>"Ò",
            "\u00d3" =>"Ó",
            "\u00d4" =>"Ô",
            "\u00d5" =>"Õ",
            "\u00d6" =>"Ö",
            "\u00d8" =>"Ø",
            "\u00d9" =>"Ù",
            "\u00da" =>"Ú",
            "\u00db" =>"Û",
            "\u00dc" =>"Ü",
            "\u00dd" =>"Ý",
            "\u00df" =>"ß",
            "\u00e0" =>"à",
            "\u00e1" =>"á",
            "\u00e2" =>"â",
            "\u00e3" =>"ã",
            "\u00e4" =>"ä",
            "\u00e5" =>"å",
            "\u00e6" =>"æ",
            "\u00e7" =>"ç",
            "\u00e8" =>"è",
            "\u00e9" =>"é",
            "\u00ea" =>"ê",
            "\u00eb" =>"ë",
            "\u00ec" =>"ì",
            "\u00ed" =>"í",
            "\u00ee" =>"î",
            "\u00ef" =>"ï",
            "\u00f0" =>"ð",
            "\u00f1" =>"ñ",
            "\u00f2" =>"ò",
            "\u00f3" =>"ó",
            "\u00f4" =>"ô",
            "\u00f5" =>"õ",
            "\u00f6" =>"ö",
            "\u00f8" =>"ø",
            "\u00f9" =>"ù",
            "\u00fa" =>"ú",
            "\u00fb" =>"û",
            "\u00fc" =>"ü",
            "\u00fd" =>"ý",
            "\u0107" =>"ć",
            "\u017c" =>"ż",
            "\u0105" =>"ą",
            "\u0142" =>"ł",
            '\u0105' => 'ą',
            '\u0107' => 'ć',
            '\u0119' => 'ę',
            '\u0142' => 'ł',
            '\u0144' => 'ń',
            '\u00f3' => 'ó',
            '\u015b' => 'ś',
            '\u017a' => 'ź',
            '\u017c' => 'ż',
            '\u0104' => 'Ą',
            '\u0106' => 'Ć',
            '\u0118' => 'Ę',
            '\u0141' => 'Ł',
            '\u0143' => 'Ń',
            '\u00d3' => 'Ó',
            '\u015a' => 'Ś',
            '\u0179' => 'Ż',
            '\u017b' => 'Ż',
            // '&#58;'  => ":",
            "\u00ff" =>"ÿ");
    
        return strtr($valor, $utf8_ansi2);      
    
    }
    /**
     * @param array $array
     * @return array
     */
    function arrayRecurs($array = []) {
        global $tables;
        foreach($array as $k => $v){
            if(is_array($v)) {
                arrayRecurs($v);
            } else {
                $tables[$k] = $v;
            }
            
        }
        return $tables;
    }

    function addVars($html, $data = [], $lang = []) {
        preg_match_all('#(\$[\w]+)#', $html, $matches);
        foreach ($data as $key => $value) {
            foreach ($matches[1] as $key => $v) {
                if(isset($value[$v])) {
                    $html = str_replace($v, $value[$v], $html);
                }
            }
        }
        ob_start();
            echo $html;
        $html = ob_get_clean();
        
        return i18n($html,$lang);
    }

    function i18n ($html, $data= null) {
        $d = [];
        if(gettype($data) == "array") {
            $table = arrayRecurs($data);
            $data = Utf8_ansi(json_encode($table));
            $data = str_replace('\/', "/", str_replace(['",',"https:"], ['";',''], $data));
        }
       
       
        if(substr($data,0,1) === "{") {
            preg_match('#{(.*)}#', str_replace('"', "", $data), $match);
            $data = $match[1];
        }
        preg_match_all('#(\$[{\w}]+)#', $html, $matches); 
        $parse2 = explode(";", $data);
        foreach ($parse2 as  $value) {
            $t = explode(":", $value);
            $d['${' . trim(current($t)) . '}'] = trim(next($t));
        }
        foreach ($matches[1] as $v) {
            if(isset($d[$v])) {
                $html = str_replace($v, $d[$v], $html);
            }
        }
        // $html = str_replace("&#58;", ":", $html);
        return  $html;
    }