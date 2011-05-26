<?php
require_once("./helpers.php");

$salt1 = "#$%GHbA~f";
$salt2 = "1-Q<$)!lD";


function create_user()
{
	global $salt1;
	global $salt2;
	global $webroot;
	
	if(isset($_POST['reg_submit']) )
	{
  		$uname = $_POST['uname'];
 		$email = $_POST['email'];
 		$upass = $_POST['upass'];
 		$upass_confirm = $_POST['upass_confirm'];
 		$fname = $_POST['fname'];
 		$lname = $_POST['lname'];
		
  		$usalpass="$salt1$upass$salt2";
		$usalpass_conf="$salt1$upass_confirm$salt2";
		
		if($uname && $email && $upass && $upass_confirm && $fname && $lname)
		{
			if(is_free($uname))
			{
				if(is_valid_email($email))
				{
					if(check_passwords($usalpass, $usalpass_conf))
					{			
							$user_create_query="INSERT INTO user (username, email, password, fname, lname) 
												VALUES('$uname', '$email', md5('$usalpass'), '$fname', '$lname')";
							execute_query($user_create_query);
							$_SESSION['flash']="Успешна регистрация!";
							header("Location: {$webroot}/calendar/");
							return;
					}
					else
					{
						$_SESSION['flash'] = "Не са въведени еднакви пароли!"; 
						header("Location: {$webroot}/register");
					}
				}
				else
				{
					$_SESSION['flash']= "Въвели сте невалиден email!";
					header("Location: {$webroot}/register");
				}
			}
			else
			{
				$_SESSION['flash']= "Потребителското име е заето!";
				header("Location: {$webroot}/register");
			}
		}
		else { 
		echo $uname;
		$_SESSION['flash'] = "Има празно поле!";
		header("Location: {$webroot}/register");
		}
	}
	return array(
	'assign' => array(''),
	'display' => 'templates_c/register.tpl');
}

function is_free($uname)
{
	$query = "SELECT * FROM user WHERE username='$uname'";
	$result = table_content($query);
	return (!count($result));
}

function is_valid_email($email) {
  return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email);
}

function check_passwords($pass1, $pass2)
{
	return ($pass1 === $pass2);
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
	global $webroot;
	if(isset($_POST['login']))
	{
		if(is_null($_POST['uname'] || is_null($_POST['upass'])))
		echo "Въведете парола!";
		
		$user = check_login($_POST['uname'], $_POST['upass']);
		if($user)
		{
			$_SESSION['uid'] = $user['id'];
			$_SESSION['uname'] = $user['username'];
			$_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
			
			$_SESSION['flash'] = "Успешно влязохте като {$_SESSION['uname']}!";
			header("Location: {$webroot}/calendar/");
		}
		else {
			$_SESSION['flash'] = "Въвели сте грешно потребителско име/парола!";
			header("Location: ./");
		}
	}
		
	return array(
	'assign' => array(''),
	'display' => 'templates_c/login.tpl');
}

function logout()
{
	global $webroot;
	session_destroy();
	session_start();
	$_SESSION['flash'] = "Успешно излязохте!";
	header("Location: {$webroot}/calendar/");
}

//------------ajax try
function validate()
{
	$user = $_REQUEST['username'];
	//$user = $_POST['uname'];
	 
	if(strlen($user) <= 0)
	{
	  echo json_encode(array('code'  =>  -1,
	  'result'  =>  'Invalid username, please try again.'
	  ));
	  die;
	}

	$query = "Select * from USER where username='$user'";
	$result=execute_query($query);
	$available=($result->num_rows);

	 
	if(!$available)
	{
	  echo json_encode(array('code'  =>  1,
	  'result'  =>  "Success,username $user is still available"
	  ));
	  die;
	}
	else
	{
	  echo  json_encode(array('code'  =>  0,
	  'result'  =>  "Sorry but username $user is already taken."
	  ));
	  die;
	}
	die;
}
?>
