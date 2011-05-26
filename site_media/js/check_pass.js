  function pullAjax(){
    var request;
    try{
      request=new XMLHttpRequest()
    }
    catch(b)
    {
      try
      {
        request=new ActiveXObject("Msxml2.XMLHTTP")
      }catch(b)
      {
        try
        {
          request=new ActiveXObject("Microsoft.XMLHTTP")
        }
        catch(b)
        {
          alert("Your browser broke!");return false
        }
      }
    }
    return request;
  }
 
  function validate_pass()
  {
    site_root = '';
    var xp = document.getElementById('upass');
	var yp = document.getElementById('upass_confirm');
    var msg = document.getElementById('passmsg');
    pass = xp.value;
	confpass = yp.value;
 
    code = '';
    message = '';
    obj=pullAjax();
    obj.onreadystatechange=function()
    {
      if(obj.readyState==4)
      {
        eval("result = "+obj.responseText);
        code = result['code'];
        message = result['result'];
 
        if(code <=0)
        {
          xp.style.border = "1px solid red";
          msg.style.color = "red";
        }
        else
        {
          xp.style.border = "1px solid #000";
          msg.style.color = "green";
        }
        msg.innerHTML = message;
      }
    }
	obj.open("GET","../validate_password?password="+pass+"&confirm_pass="+confpass,true);
	//obj.open("POST","validate",true);
    obj.send(null);
  }