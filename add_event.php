<?php

require_once('./helpers.php');


function add_event() {
  global $webroot;
  global $mysqli;
  global $is_logged_user;

  if ($is_logged_user) {
    $uid = $_SESSION['uid'];
    if(isset($_POST['addevent'])) {
      $date = $_POST['date'];
      $ride_info = $_POST['ride_info'];
      $displacement = $_POST['displacement'];
      $distance = $_POST['distance'];
      $from = $_POST['from'];
      $to = $_POST['to'];
      $route_info = $_POST['route_info'];
      $ride_info = $_POST['ride_info'];

      if($date && $ride_info && $displacement && $from && $to && $route_info) {
	$route_query = "insert into route(displacement, distance, start, end, additional_info)
	  values($displacement, $distance, '$from', '$to', '$route_info')";

	echo("das");
	execute_query($route_query);
	$rid = $mysqli->insert_id;
	$ride_event_query = "insert into ride_event(when_datetime, additional_info, owner, route)
					      values('$date', '$ride_info', $uid, $rid)";
	execute_query($ride_event_query);
	$_SESSION['flash'] = "Успешно добавихте събитие! ". $route_query;
	header("Location: {$webroot}/calendar/");
      }

    }
    return array(
      'assign' => array(),
      'display' => 'templates_c/add_event.tpl');
  }

  else {
    $_SESSION['flash'] = "За да добавите събитие трябва да сте влезли!";
    header("Location: {$webroot}/login/");
  }
}

?>
