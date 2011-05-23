<?php

require_once("./helpers.php");


//$arr = array($day, $month, $year);
function user_events() {
  $userame = $_SESSION['username'];
  $user_events_query = "select * from 
    ride_event re join user_has_ride_event ue on re.id = ue.ride_event_id 
    join user u on ue.user_id=u.id
    where u.username= '$username'";
  $user_events = table_content($user_events_query);

  return array(
    'assign' => array('day_events' => $day_events),
    'display' => 'templates_c/events.tpl');
}

?>
