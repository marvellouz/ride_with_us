function checkUser(user)
{
    //document.getElementById('check_user').innerHTML= "sda";
	if (user.value == '')
	{
		document.getElementById('check_user').innerHTML = '';
		return
	}

	params   =  user.value;
	callback = { success:successHandler, failure:failureHandler }
	request  = YAHOO.util.Connect.asyncRequest('POST',
		'check_user_aj', callback, params); 
	if(request)
	{
		document.getElementById('check_user').innerHTML = 'името е свободно';
		
	}
}

function successHandler(o)
{
	document.getElementById('check_user').innerHTML = o.responseText;
}

function failureHandler(o)
{ 
	document.getElementById('check_user').innerHTML =
		o.status + " " + o.statusText;
}
