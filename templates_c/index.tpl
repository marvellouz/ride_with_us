<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="bg" lang="bg">
<head>
<title> </title>
<meta http-equiv="content-type"
content="text/html;charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link rel="stylesheet" href="{$site_media}/style.css" type="text/css" media="screen" />
{*<script type="text/javascript" src="/xampp/fmi-php/HW5/site_media/js/external.js"> *}
</script>
<!--[if lte IE 6]>
<p bgcolor = "#7A0900">
<em>Сайтът изглежда по този начин, защото използвате internet explorer 6 или по-стара версия. Моля използвайте <a href = "http://www.mozilla.com/">browser</a>.
</em></p>
<![endif]-->

</head>
<body>
<div id="container">
<div id="header">
<h1>Карай с нас</h1>
<div id="menu">
<ul>
<li><a href="{$webroot}/calendar/">Начало</a></li>
{if $is_logged_user}
<li id="hello">Здравейте, {$user_name}! </li>
<li><a href="{$webroot}/logout/">[изход]</a></li>
{else}
<li id="login"><a href="{$webroot}/login/">Вход</a></li>
<li id="register"><a href="{$webroot}/register/">Регистрация</a></li>
{/if}
</ul>
</div>

</div>
<div id="content">
{block name=content}
{$cal}
{/block}
</content>
<div id=footer></div>
</div>
</body>
</html>
