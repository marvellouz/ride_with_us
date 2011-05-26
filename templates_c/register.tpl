{extends file="templates_c/index.tpl"}
{block name=content}


<form method="POST" action="register">
<label for="uname">Въведете потребителско име:</label>
<br />
<input type="text" id="uname" name="uname" onBlur='validate()'/> <span id="msg"></span>
<br />
<label for="upass">Въведете парола:</label>
<br />
<input type="password" id="upass" name="upass" />
<br />
<label for="upass_confirm">Повторете паролата</label>
<br />
<input type="password" id="upass_confirm" name="upass_confirm" onBlur='checkPass()'/><span id='conf_pass'></span>
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
{/block}
