<?php
function get_datan($name){
	if(!isset($_REQUEST[$name])){
		return 0;
	}
	return (int)$_REQUEST[$name];
}
function get_data($name){
	if(!isset($_REQUEST[$name])){
		return false;
	}
	return $_REQUEST[$name];
}
function jsonn($name,$value){
	return "\"$name\":$value";
}
function jsons($name,$value){
	return "\"$name\":\"$value\"";
}
function jsona($name,$a){
	$str="";
	$lenght=0;
	for($i=0;$i<$length;$i++)
	{
		$str.="\"$value\"";
		if($i<$length-1){
			$str.=",";
		}
	}
	return $str;
}
?>