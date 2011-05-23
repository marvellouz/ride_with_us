{extends file="templates_c/index.tpl"}
{block name=content}

<form method="post" action="login"> 
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

{/block}
