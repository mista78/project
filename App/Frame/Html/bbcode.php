<?php 

global $conf;

function paramParser () {
	
	$arg = [

		'\[b\](.*?)\[\/b\]' 				=> '<strong>$1</strong>',
		'\[i\](.*?)\[\/i\]' 				=> '<em>$1</em>',
		'\[code\](.*?)\[\/code\]' 			=> '<pre>$1</pre>',
		'\[quote\](.*?)\[\/quote\]' 		=> '<blockquote>$1</blockquote>',
		'\[list\](.*?)\[\/list\]' 			=> '<ul>$1</ul>',
		'\[\*\](.*?)\[\/\*\]' 				=> '<li>$1</li>',
		'\[u\](.*?)\[\/u\]' 				=> '<u>$1</u>',
		'\[img\](.*?)\[\/img\]' 			=> '<img src="$1" alt="$1">',
		'\[url=([^\]]*)\](.*?)\[\/url\]' 	=> '<a href="$1">$2</a>',

	];

	return $arg;
}

function parser ( $text ) {

	$text = htmlentities( $text, ENT_NOQUOTES, "UTF-8" );

	foreach ( paramParser() as $k => $v ) {
		$text = preg_replace( '/'.$k.'/msi', $v, $text );
	}

	$text =nl2br( $text );

	return $text;
}
