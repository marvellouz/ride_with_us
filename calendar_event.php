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
  $day_events_query = "select * from ride_event where date(when_datetime) = '$date'";
  $day_events = table_content($day_events_query);
  //print_r($day_events);

  return array(
    'assign' => array('day_events' => $day_events),
    'display' => 'templates_c/events.tpl');
}

?>
