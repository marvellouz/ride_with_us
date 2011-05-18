<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 11:36:10
         compiled from "templates_c/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17235863264dd3930a30aef2-91315244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '134698f94fc70d4dc67bb071fd3c80b5e24d4616' => 
    array (
      0 => 'templates_c/index.tpl',
      1 => 1305711369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17235863264dd3930a30aef2-91315244',
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
<link rel="stylesheet" href="/xampp/fmi-php/HW5/site_media/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="/xampp/fmi-php/HW5/site_media/js/external.js">  
</script>
<!--[if lte IE 6]>
<p bgcolor = "#7A0900">
<em>Сайтът изглежда по този начин, защото използвате internet explorer 6 или по-стара версия. Моля използвайте <a href = "http://www.mozilla.com/">browser</a>.
</em></p>
<![endif]-->

</head>
<body>

<table>
  <tr>
    <tr><th colspan="7"><?php echo $_smarty_tpl->getVariable('today')->value['month'];?>
 - <?php echo $_smarty_tpl->getVariable('today')->value['year'];?>
</th></tr>
  </tr>
  <tr>
    <td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td>
  </tr>
  <?php echo $_smarty_tpl->getVariable('cal')->value;?>

</table>

</body>
</html>
