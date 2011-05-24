<?php

require_once("./helpers.php");


//$arr = array($day, $month, $year);
function events($arr) {
  if(count($arr)!=3) {
    header("Location: {$_SERVER["SCRIPT_NAME"]}/calendar/");
  }
  $day = $arr[0];
  $month = $arr[1];
  $year = $arr[2];
  $date = "$year-$month-$day";
  $day_events_query = "select when_datetime, username as owner_username,
    fname as owner_fname,
    email as owner_email,
    start, end,
    re.id as event_id,
    re.additional_info as ride_info
    from ride_event re join user u on re.owner=u.id
    join route r on re.route=r.id 
    where date(when_datetime) = '$date'";
  $day_events = table_content($day_events_query);
  //print_r($day_events);

  return array(
    'assign' => array('day_events' => $day_events),
    'display' => 'templates_c/events.tpl');
}

//$arr = array($event_id);
function event($arr) {

  global $is_logged_user;
  $event_id = $arr[0];

  if($is_logged_user) {
    $owner_query = "select u.username, u.fname, u.lname, u.email, u.is_admin
      from ride_event re join user u on re.owner=u.id
      where re.id=$event_id;";
    $users_attending_query = "select u.username, u.email, u.fname, u.lname, u.is_admin
      from user u join user_has_ride_event ue on u.id=ue.user_id
      join ride_event re on ue.ride_event_id=re.id
      where re.id=$event_id;";
    $event_comments_query = "select u.username as author_username, u.email as author_email, 
      u.fname as author_fname, u.lname as author_lname,
      c.created_at, c.body
      from user u join comment c on u.id=c.author
      where about=$event_id;";
    $ride_info_query = "select re.when_datetime, re.additional_info as ride_info,
      r.displacement, r.distance, r.start, r.end, r.additional_info as route_info
      from ride_event re join route r
      where re.id=$event_id;";
    $owner_info = table_content($owner_query);
    $users_attending = table_content($users_attending_query);
    $event_comments = table_content($event_comments_query);
    $ride_info = table_content($ride_info_query);
    //print_r($owner_info);
    //print_r($users_attending);
    //print_r($event_comments);
    //print_r($ride_info);

    return array(
      'assign' => array('owner_info' => $owner_info[0], 
			'users_attending' => $users_attending, 
			'event_comments' => $event_comments, 
			'ride_info' => $ride_info[0]),
      'display' => 'templates_c/event.tpl');

  }
}


?>
