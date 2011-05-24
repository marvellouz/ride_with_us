{extends file="templates_c/index.tpl"}
{block name=content}

<script src="../../../build/yahoo/yahoo-min.js"></script>
<script src="../../../build/event/event-min.js"></script>
<script src="../../../build/connection/connection-min.js"></script>

<script src="../js/check_user.js"></script>

<form method="POST" action=".">
<label for="uname">Въведете потребителско име:</label>
<br />
<input type="text" id="uname" name="uname" onBlur='checkUser(this)'/><span id='check_user'></span>
<br />
<label for="upass">Въведете парола:</label>
<br />
<input type="password" id="upass" name="upass" />
<br />
<label for="upass_confirm">Повторете паролата</label>
<br />
<input type="password" id="upass_confirm" name="upass_confirm" onBlur='checkPass(this)'/><span id='conf_pass'></span>
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
