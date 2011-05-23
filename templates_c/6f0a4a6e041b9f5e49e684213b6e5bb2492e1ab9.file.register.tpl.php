<?php /* Smarty version Smarty-3.0.7, created on 2011-05-23 19:12:17
         compiled from "templates_c/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131524dda87615f7905-04794061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f0a4a6e041b9f5e49e684213b6e5bb2492e1ab9' => 
    array (
      0 => 'templates_c/register.tpl',
      1 => 1306167082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131524dda87615f7905-04794061',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<form method="POST" action="register">
<label for="uname">Въведете потребителско име:</label>
<br />
<input type="text" id="uname" name="uname" />
<br />
<label for="upass">Въведете парола:</label>
<br />
<input type="password" id="upass" name="upass" />
<br />
<label for="upass_confirm">Повторете паролата</label>
<br />
<input type="password" id="upass_confirm" name="upass_confirm" />
<br />
<label for="fname">Име:</label>
<br />
<input type="text" id="fname" name="fname" />
<br />
<label for="lname">Фамилия:</label>
<br />
<input type="text" id="lname" name="lname" />
<br />
<label for="">e-mail:</label>
<br />
<input type="text" id="email" name="email" />
<br />
<input type="submit" id="reg_submit" name="reg_submit" value="Register" />
</form>