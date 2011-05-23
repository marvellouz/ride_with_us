<?php

require_once("./calendar.php");
require_once("./calendar_event.php");

//defining what url patterns get mapped into what funcitons.
//if no route is provided 'default' route is used
$routes = array(
  "calendar" => "create_month",
  "events" => "events",
);
?>
