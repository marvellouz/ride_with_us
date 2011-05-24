<?php
require_once("./helpers.php");

$salt1 = "#$%GHbA~f";
$salt2 = "1-Q<$)!lD";


function create_user()
{
	global $salt1;
	global $salt2;
	
	if(isset($_POST['reg_submit']) )
	{
/* 		$uname = get_data('uname');
		$email = get_data('email');
		$upass = get_data('upass');
		$upass_confirm = get_data('upass_confirm');
		$fname = get_data('fname');
		$lname = get_data('lname');
 */
 
  		$uname = $_POST['uname'];
 		$email = $_POST['email'];
 		$upass = $_POST['upass'];
 		$upass_confirm = $_POST['upass_confirm'];
 		$fname = $_POST['fname'];
 		$lname = $_POST['lname'];
		
  		$usalpass="$salt1$upass$salt2";
		$usalpass_conf="$salt1$upass_confirm$salt2";
		
		if($uname && $email && $upass && $upass_confirm && $fname && $lname)
		//if($uname !="")
		{
			if($usalpass == $usalpass_conf)
			{
				
				$user_create_query="INSERT INTO user (username, email, password, fname, lname) 
									VALUES('$uname', '$email', md5('$usalpass'), '$fname', '$lname')";
				execute_query($user_create_query);
				$_SESSION['flash']="Успешна регистрация!";
			}
			else
			{
				$_SESSION['flash'] = "Не са въведени еднакви пароли!"; 
				header("Location: ./");
			}
		}
		else 
		$_SESSION['flash'] = "Има празно поле!";
	}
	return array(
	'assign' => array(''),
	'display' => 'templates_c/register.tpl');
}

/* function get_data($field)
{
	global $mysqli;
	return $mysqli->real_escape_string($_POST[$field]);
} */ 
 
function check_login($uname, $upass)
{
	global $salt1;
	global $salt2;
	$usalpass = md5("$salt1$upass$salt2");
	
	$user_query ="SELECT * FROM user WHERE username='$uname' AND password='$usalpass' LIMIT 1";
	$user= table_content($user_query);
	if(count($user)== 0 )return false;
	return $user[0];
}


function login()
{
	if(isset($_POST['login']))
	{
		if(is_null($_POST['uname'] || is_null($_POST['upass'])))
		echo "Въведете парола!";
		
		$user = check_login($_POST['uname'], $_POST['upass']);
		if($user)
		{
			$_SESSION['uname'] = $user['username'];
			$_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
			
			header("Location: calendar/");
			exit;
		}
		$_SESSION['flash'] = "Въвели сте грешно потребителско име/парола!";
		
		$_SESSION['flash'];
		//header("Location: ./");
	}
		
	return array(
	'assign' => array(''),
	'display' => 'templates_c/login.tpl');
}

function logout()
{
	session_destroy();
	//header("Location: ./");	
	return array(
	'assign' => array(''),
	'display' => 'templates_c/logout.tpl'
	);
}


?>