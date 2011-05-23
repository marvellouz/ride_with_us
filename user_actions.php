<?php
require_once("./helpers.php");


function check_login($uname, $pass)
{
	$salt1 = "#$%GHbA~f";
	$salt2 = "1-Q<$)!lD";
	$upass = md5("$salt1$pass$salt2");
	
	$user_query ="SELECT * FROM user WHERE username='$uname' AND password='$upass' LIMIT 1";
	$user= table_content($user_query);
	if(count($user)== 0 )return false;
	return $user[0];
}


function login()
{
	if(isset($_POST['login']))
	{
		if(is_null($_POST['uname']))
		echo "Въведете парола!";
		
		$user = check_login($_POST['uname'], $_POST['upass']);
		//var_dump($user);
		if($user)
		{
			$_SESSION['uname'] = $user['username'];
			$_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
			
			header("Location: ../calendar/");
			exit;
		}
		$_SESSION['flash'] = "Въвели сте грешно потребителско име/парола!";
		
		echo $_SESSION['flash'];
		//header("Location: ./");
	}
		
	return array(
	'assign' => array(''),
	'display' => 'templates_c/login.tpl');
}
?>