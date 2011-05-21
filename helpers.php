<?php
require_once("./libs/Smarty.class.php");
require_once("./doctrine_pi.php");

session_start();

$smarty = new Smarty;

$isset_flash = array_key_exists('flash', $_SESSION);
$is_logged_user = array_key_exists('uid', $_SESSION);


?>
