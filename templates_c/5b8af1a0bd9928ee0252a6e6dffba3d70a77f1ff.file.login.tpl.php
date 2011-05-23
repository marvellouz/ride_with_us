<?php /* Smarty version Smarty-3.0.7, created on 2011-05-23 14:27:47
         compiled from "templates_c/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69224dda44b39898c0-48893809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b8af1a0bd9928ee0252a6e6dffba3d70a77f1ff' => 
    array (
      0 => 'templates_c/login.tpl',
      1 => 1306150067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69224dda44b39898c0-48893809',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="user_actions.php"> <!-- the action points to this same file. When the uname submits, the isset($_POST['login']) check will return true -->
<!-- using the label fields is convenient but you can see the fields are not well arranged - a drawback compared to tables; can be fixed with some CSS tuning -->
	<label for="uname">User name: </label>
	<input type="text" id="uname" name="uname"/>
	<br/>
	<label for="upass">Password: </label>
	<input type="password" id="upass" name="upass"/>
	<br/>
	<input type="submit" name="login" value="Login"/> <!-- we put a name to the submit button in order to check for submission - see up above -->
</form>