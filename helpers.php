<?php

require_once("./libs/Smarty.class.php");
require_once("./dbconf.php");

session_start();

$smarty = new Smarty;

$mysqli=new mysqli($host, $user, $password, $schema);

$mysqli->set_charset("utf8");

if (mysqli_connect_error()) {
  die('Connect Error (' . mysqli_connect_errno() . ') '
    . mysqli_connect_error());
}

function execute_query($query_string) {
  global $mysqli;
  return $mysqli->query($query_string);
}


function table_content($query_string) {
  global $mysqli;
  $query_result = $mysqli->query($query_string);
  $result = array();
  if($query_result) {
    while ($row = $query_result->fetch_assoc()) {
      array_push($result, $row);
    }
  }
  return $result;
}

function sanitize_my_sql($var)
{
	global $mysqli;
    $var = $mysqli->real_escape_string($var);
    $var = sanitize_string($var);
    return $var;
}

function sanitize_string($var)
{
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}

if(array_key_exists('flash', $_SESSION)) {
  $smarty->assign('flash', $_SESSION['flash']);
  $_SESSION['flash']="";
}


$is_logged_user = array_key_exists('uname', $_SESSION);
$webroot = $_SERVER["SCRIPT_NAME"];
$site_media = dirname($webroot)."/site_media";
$smarty->assign('webroot', $webroot);
$smarty->assign('site_media', $site_media);
$smarty->assign('is_logged_user', $is_logged_user);
if($is_logged_user){
  $smarty->assign('user_name', $_SESSION['uname']);
}
?>
