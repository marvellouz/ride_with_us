<?php /* Smarty version Smarty-3.0.7, created on 2011-05-23 18:36:04
         compiled from "templates_c/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305504dda7ee47192e6-23332864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b8af1a0bd9928ee0252a6e6dffba3d70a77f1ff' => 
    array (
      0 => 'templates_c/login.tpl',
      1 => 1306164956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305504dda7ee47192e6-23332864',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<form method="post" action="login"> 
	<label for="uname">Потребителско име: </label>
	<br />
	<input type="text" id="uname" name="uname"/>
	<br/>
	<label for="upass">Парола: </label>
	<br />
	<input type="password" id="upass" name="upass"/>
	<br/>
	<input type="submit" name="login" value="Login"/>
</form>