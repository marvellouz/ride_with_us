<?php

require_once("./calendar.php");
require_once("./user_actions.php");
require_once("./search.php");
require_once("./calendar_event.php");
require_once("./add_event.php");

//defining what url patterns get mapped into what funcitons.
//if no route is provided 'default' route is used
$routes = array(
  "calendar" => "calendar",
  "login" => "login",
  "register" => "create_user",
  "events" => "events",  
  "logout" => "logout",
  "event" => "event",
  "myevents" => "user_events",
  "search" => "search_string",
  "attend" => "attend_event",
  "validate_username" => "validate_username",
  "validate_password" => "validate_password",
  "mycalendar" => "user_calendar",
  "addevent" => "add_event",
);
?>
