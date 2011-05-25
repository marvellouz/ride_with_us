<?php
include_once ('helpers.php');
/* $host = 'localhost';
$user = 'php';
$password = 'php1'; 
$schema = 'ride_with_us';


$mysqli=new mysqli($host, $user, $password, $schema);
  */
 
$user = $_REQUEST['username'];
 
if(strlen($user) <= 0)
{
  echo json_encode(array('code'  =>  -1,
  'result'  =>  'Invalid username, please try again.'
  ));
  die;
}

//$available=1; 
// Query database to check if the username is available
$query = "Select * from USER where username='$user'";
//var_dump($query);

$result=execute_query($query);
//var_dump($result);

$available=($result->num_rows);
//var_dump($available);

// Execute the above query using your own script and if it return you the
// result (row) we should return negative, else a success message.
 
//$available = true;
 
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
?>