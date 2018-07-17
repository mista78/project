<?php

global $conf;
return [

	'secret' => @$conf['config']['secret'],
	'site' => @$conf['config']['site'],
];