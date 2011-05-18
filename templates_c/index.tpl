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
    <tr><th colspan="7">{$today['month']} - {$today['year']}</th></tr>
  </tr>
  <tr>
    <td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td>
  </tr>
  {$cal}
</table>

</body>
</html>
