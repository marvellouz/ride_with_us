<?php
require_once("./helpers.php");

//function search

//$string="sad#///\\%^sj89";
//echo $string . "   ------------<br />";

function search_string($string)
{
	global $mysqli;
	//echo stripslashes($string);
	//echo $mysqli->real_escape_string($string);
	//echo sanitize_string($string);
	
	
	
	return array(
	'assign' => array(''),
	'display' => 'templates_c/search.tpl');
}


?>