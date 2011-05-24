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

?>
