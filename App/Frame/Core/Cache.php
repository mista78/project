<?php 


function CacheWrite($cachename,$content) {
	global $conf;
	return file_put_contents($conf['dirname'] . '/' . $cachename, $content);
}

function CacheRead($cachename) {
	global $conf;
	$file = $conf['dirname'] . '/' . $cachename;
	if (!file_exists($file)) {
		return false;
	}
	$times = (time() - filemtime($file)) / 60;
	if ($times > $conf['duration']) {
		return false;
	}
	return file_get_contents($file);
}

function CacheStart($cachename) {
	global $conf;
	if ($content = CacheRead($cachename)) {
		echo $content;
		config('buffer', false);
		return true;
	}
	ob_start();
	config('buffer', $cachename);
}

function CacheEnd() {
	global $conf;
	if (!$conf['buffer']) {
		return false;
	}
	$content = ob_get_clean();
	echo $content;
	CacheWrite($conf['buffer'],$content);
}