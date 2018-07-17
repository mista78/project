<?php

	function link_style($arg = [])
	{
	    if (isset($arg['file'])) {
	        $html = '<link rel="stylesheet" href="'. WEBROOT . $arg['file'] .  '.css?ver='. files('Public/' . $arg['file'] . '.css') .'">';
	    } else {
	        $html = '<link rel="stylesheet" href="'. $arg['src'] .  '.css">';
	    }
	    return $html;
	}

	function HtmlStart($options) {
	    $defArgs = ['tags'];
	    $args = (isset($options['args'])) ? array_push($defArgs,$options['args']) :  $defArgs;
	    $attr = attribute($options, ['tags','html']);
	    $options['html'] = (isset($options['html'])) ? $options['html'] :  'div';
	    return "<{$options['html']} {$attr}>";
	}

	function link_script($arg = [])
	{
	    if (isset($arg['file'])) {
	         $html = '<script src="'. WEBROOT . $arg['file'] .  '.js?ver='. files('Public/' . $arg['file'] . '.js') .'"> </script>';
	    } else {
	        $html = '<script src="'. $arg['src'] .  '.js"> </script>';
	    }
	    return $html;
	}

	function scan() {
		$dir = APP . "Module"; 
		$data = [];
		if (is_dir($dir)) {
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		        	if ($file != '.' && $file != '..') {
		        		$file = strtolower($file);
		        		$data[$file] = ucfirst($file);
		        	}
		        }
		        closedir($dh);
		    }
		}
		$data = parsing(['unset' => ['erreur','gestion','maintenance']],$data);
		return $data;
	}

	function Template() {
		$dir = APP . "Theme"; 
		$data = [];
		if (is_dir($dir)) {
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		        	if ($file != '.' && $file != '..') {
		        		$file = strtolower($file);
		        		$val = str_replace('.php', '', $file );
		        		$data[$val] = $val;
		        	}
		        }
		        closedir($dh);
		    }
		}
		$data = parsing(['unset' => ['admin','error','maint']],$data);
		return $data;
	}

	function files($file = "")
	{
	    return filemtime(ROOT . $file);
	}


	function callBack($matche) {
		return $matche[3];
	}


	function parsing ($arg = null, $dos = null) {
	    global $_POST;

	    $don = ($dos != null) ? $dos : $_POST;
	    $data = [];
	    if (is_array($arg)) {
	        foreach ($arg['unset'] as $value) {
	            unset($don[$value]);
	        }
	    } else {
	        unset($don[$arg]);
	    }
	    foreach ($don as $key => $value) {
	        $data[$key] = htmlspecialchars($value);
	    }

	    return $data;
	}

	function unsets ($arg = null) {
	    global $_POST;
	    $arg['exep'] = isset($arg['exep']) ? $arg['exep'] : [];
	    $data = [];
	    if (is_array($arg)) {
	        if (isset($arg['unset'])) {
	        	foreach ($arg['unset'] as $value) {
		            unset($_POST[$value]);
		        }
	        } elseif (isset($arg['post'])) {
	        	foreach ($arg['post'] as $key => $value) {
	        		if (!in_array($key , $arg['exep'])) {
	        			unset($_POST[$key]);
	        		}
	        	}
	        }
	    } else {
	        unset($_POST[$arg]);
	    }
	    foreach ($_POST as $key => $value) {
	        $data[$key] = $value;
	    }

	    return $data;
	}

	function HtmlParse($value) {
	    global $parser;
	    $value = htmlspecialchars($value);
	    $parser->parse($value);
	    $html = $parser->getAsHTML();
	    $html = preg_replace_callback("/([&lt;]+)script([&gt;]+)([a-zA-Z0-9.\"{}(');\/ ]+)([&lt;\/]+)script([&gt;]+)/",'callBack',$html);
	    return $html;
	}
	
	function ternaire ($arg = []) 
	{
	  $count = count($arg);
	  $html = "";
	
	  foreach ($arg['data'] as $key => $value) {
	    if ($key == $arg['value']) {
	      $html = $value;
	    }
	  }
	
	  return $html;
	}
?>