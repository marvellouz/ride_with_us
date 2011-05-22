<?php

require_once("./helpers.php");


//$arr = array($day, $month, $year);
function events($arr) {
  $day = $arr[0];
  $month = $arr[1];
  $year = $arr[2];
  $timezone = "Europe/Athens";
  $format = 'Y-m-d';
  $date = DateTime::createFromFormat($format, "$year-$month-$day", new DateTimeZone($timezone));
  $events = Doctrine::getTable('RideEvent');
  $day_events = $events->findByDay($date->format($format))->toArray();
  if($day_events->count()) {
  }

  return array(
    'assign' => array(),
    'display' => "templates_c/events.tpl");
}

?>
