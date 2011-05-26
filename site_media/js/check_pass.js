  function pullAjax(){
    var a;
    try{
      a=new XMLHttpRequest()
    }
    catch(b)
    {
      try
      {
        a=new ActiveXObject("Msxml2.XMLHTTP")
      }catch(b)
      {
        try
        {
          a=new ActiveXObject("Microsoft.XMLHTTP")
        }
        catch(b)
        {
          alert("Your browser broke!");return false
        }
      }
    }
    return a;
  }
 
  function validate()
  {
    site_root = '';
    var x = document.getElementById('upass');
	var y = document.getElementById('upass_confirm');
    var msg = document.getElementById('msg_pass');
    pass = x.value;
	confpass = y.value;
 
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
          x.style.border = "1px solid red";
          msg.style.color = "red";
        }
        else
        {
          x.style.border = "1px solid #000";
          msg.style.color = "green";
        }
        msg.innerHTML = message;
      }
    }
	obj.open("GET","../validate_password?password="+pass+"&confirm_pass="+confpass,true);
	//obj.open("POST","validate",true);
    obj.send(null);
  }