function checkPass(pass)
{
    
	if (pass.value == '')
	{
		document.getElementById('conf_pass').innerHTML = '';
		return
	}

	params   =  pass.value;
	callback = { success:successHandler, failure:failureHandler }
	request  = YAHOO.util.Connect.asyncRequest('POST',
		'check_passwords', callback, params); 
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