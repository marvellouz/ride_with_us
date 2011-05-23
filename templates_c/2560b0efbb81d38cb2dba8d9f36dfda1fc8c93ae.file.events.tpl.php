<?php /* Smarty version Smarty-3.0.7, created on 2011-05-23 13:18:09
         compiled from "templates_c/events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18985456964dda42715cb760-85351143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2560b0efbb81d38cb2dba8d9f36dfda1fc8c93ae' => 
    array (
      0 => 'templates_c/events.tpl',
      1 => 1306147712,
      2 => 'file',
    ),
    '134698f94fc70d4dc67bb071fd3c80b5e24d4616' => 
    array (
      0 => 'templates_c/index.tpl',
      1 => 1306138518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18985456964dda42715cb760-85351143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="bg" lang="bg">
<head>
<title> </title>
<meta http-equiv="content-type"
content="text/html;charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
</script>
<!--[if lte IE 6]>
<p bgcolor = "#7A0900">
<em>Сайтът изглежда по този начин, защото използвате internet explorer 6 или по-стара версия. Моля използвайте <a href = "http://www.mozilla.com/">browser</a>.
</em></p>
<![endif]-->

</head>
  <body>
    
<div id="day_events">
<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('day_events')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
?>
<div class="day_event">
  <strong>Koгa:</strong> <?php echo $_smarty_tpl->tpl_vars['event']->value['when_datetime'];?>

  <br/>
  <strong>Допълнителна информация:</strong> <?php echo $_smarty_tpl->tpl_vars['event']->value['additional_info'];?>

</div>
<?php }} ?>
</div>


  </body>
</html>
