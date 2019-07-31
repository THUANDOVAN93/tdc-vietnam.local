<?php

 function _h($str){
	echo nl2br(htmlspecialchars($str, ENT_QUOTES));
}
 function __h(){
 	$args = func_get_args();
 	$level = array_shift($args);
	echo nl2br(htmlspecialchars(__($level,$args), ENT_QUOTES));
}

function __arrTranslate($arr){
	foreach ($arr as $key => $value) {
		$arr[$key] = __($value);
	}
	return $arr;
}