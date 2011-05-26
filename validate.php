<?php
include_once ('helpers.php');

$user = $_REQUEST['username'];
 
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

?>