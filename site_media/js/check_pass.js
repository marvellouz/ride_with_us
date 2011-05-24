function checkUser(pass)
{
    
	if (pass.value == '')
	{
		document.getElementById('conf_pass').innerHTML = '';
		return
	}

	params   =  user.value;
	callback = { success:successHandler, failure:failureHandler }
	request  = YAHOO.util.Connect.asyncRequest('POST',
		'test.php', callback, params); 
}

function successHandler(o)
{
	document.getElementById('conf_pass').innerHTML = o.responseText;
}

function failureHandler(o)
{ 
	document.getElementById('conf_pass').innerHTML =
		o.status + " " + o.statusText;
}
