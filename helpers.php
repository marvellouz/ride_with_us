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


$is_logged_user = array_key_exists('uid', $_SESSION);



?>
