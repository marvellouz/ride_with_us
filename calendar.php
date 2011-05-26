<?php
require_once("./helpers.php");

function make_day($day, $month, $year, $month_events) {
  $date = "$year-$month-$day";
  $today = getdate();
  $has_event = false;

  if(count($month_events)) {
    for($i=0; $i<count($month_events); $i++){
      if ($month_events[$i]['when_date'] == $date) {
	$has_event = true;
      }
    }
  }
  $is_today = ($day == $today['mday'] && $month == $today['mon'] && $year ==$today['year'] );
  if($is_today && $has_event) {
    $day_html = "<td class='event' id='today'><a href='{$_SERVER["SCRIPT_NAME"]}/events/$day/$month/$year'><strong>$day</strong></a></td>";
    return $day_html;
  }
  if ($has_event) {
    $day_html = "<td class='event'><a href='{$_SERVER["SCRIPT_NAME"]}/events/$day/$month/$year'>$day</a></td>";
    return $day_html;
  }
  if($is_today) {
    $day_html = "<td id='today' class='event'><strong>$day<strong></td>";
    return $day_html;
  }

  $day_html = "<td>$day</td>";
  return $day_html;
}

function make_user_day($day, $month, $month_events) {
  global $user_events;
  $today = getdate();
  $has_event = flase;
}

function first_week($month, $year, $month_events) {
  $first_day = getdate(mktime(0, 0, 0, $month, 1, $year));
  $first_wday = ($first_day['wday']==0)?(7):($first_day['wday']);
  $cal = "<tr>";

  for($i = 1; $i < $first_wday; $i++) {
    $cal = $cal.'<td>&nbsp;</td>';
  }
  $actday = 0;
  for($i = $first_wday; $i <= 7; $i++) {
    $actday++;
    $cal = $cal.make_day($actday, $month, $year, $month_events);
  }
  $cal = $cal.'</tr>';
  return array($cal, $actday);
}


function last_week($month, $year, $actday, $month_events) {
  $cal = "";
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  if ($actday < $last_day['mday']) {
    $cal = '<tr>';

    for ($i=0; $i<7;$i++) {
      $actday++;
      if ($actday <= $last_day['mday']) {
	$cal = $cal.make_day($actday, $month, $year, $month_events);
      }
      else {
	$cal = $cal.'<td>&nbsp;</td>';
      }
    }

    $cal = $cal.'</tr>';
  }
  return $cal;
}

function navigation($month, $year, $calendar) {
  $prev_month = $month - 1;
  $prev_year = $year;
  if($prev_month < 1) {
    $prev_month += 12;
    $prev_year--;
  }
  $next_month = $month + 1;
  $next_year = $year;
  if($next_month > 12) {
    $next_month -= 12;
    $next_year++;
  }
  $nav = "<div id='nav'><a href='{$_SERVER["SCRIPT_NAME"]}/$calendar/$prev_month/$prev_year/'>&lt;&lt;</a>";
  $nav = $nav."<a href='{$_SERVER["SCRIPT_NAME"]}/$calendar/$next_month/$next_year/'>&gt;&gt;</a></nav>";
  return $nav;

}

// $arr = array($month, $year)
function create_month($arr) {
  global $is_logged_user;
  $today = getdate();
  if(count($arr)!=2) {
    $month = $today['mon'];
    $year = $today['year'];
  }
  else {
    $month = $arr[0];
    $year = $arr[1];
  }
  $cal = "<div id='cal'>
  <table id='calendar'>
    <tr>
	<tr><th colspan='7'>$month - $year</th></tr>
    </tr>
    <tr>
      <td>П</td><td>В</td><td>С</td><td>Ч</td><td>П</td><td>С</td><td>Н</td>
    </tr>
  ";
  $user_cal = $cal;
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  $month_events_query = "select date(when_datetime) as when_date from ride_event where month(when_datetime) = $month";
  $month_events = table_content($month_events_query);

  $first_week = first_week($month, $year, $month_events);
  $cal = $cal.$first_week[0];
  $cal .= rest_weeks($first_week, $last_day, $month, $year, $month_events);

  $cal .= navigation($month, $year, "calendar");
  $cal .= "</div>";


  //TODO:  if user is logged in -> $user_cal
  if($is_logged_user) {
    $uid = $_SESSION['uid'];
    $user_month_events_query = "select date(when_datetime) as when_date from ride_event re
				join user_has_ride_event ue on  re.id=ue.ride_event_id
				where month(when_datetime) = $month and 
				user_id = $uid";
    $user_month_events = table_content("$user_month_events_query");
    $user_first_week = first_week($month, $year, $user_month_events);
    $user_cal .= $user_first_week[0];
    $user_actday = $user_first_week[1];
    $user_cal .= rest_weeks($user_first_week, $last_day, $month, $year, $user_month_events);

    $user_cal .= navigation($month, $year, "mycalendar");
    $user_cal .= "</div>";



  }
  else {
    $user_cal = "";
  }
  return array("user_cal" => $user_cal, "cal" => $cal, 'today' => $today);


}


function calendar($arr) {
  $calendar = create_month($arr);
  $cal = $calendar['cal'];
  $today = $calendar['today'];
  return array(
    'assign' => array('cal' => $cal, 'today' => $today),
    'display' => 'templates_c/index.tpl');

}


function user_calendar($arr) {
  $calendar = create_month($arr);
  $user_cal = $calendar['user_cal'];
  $today = $calendar['today'];
  return array(
    'assign' => array('user_cal' => $user_cal, 'today' => $today),
    'display' => 'templates_c/user_calendar.tpl');

}


function rest_weeks($first_week, $last_day, $month, $year, $month_events) {
  $actday = $first_week[1];
  $fullWeeks = floor(($last_day['mday']-$actday)/7);

  $cal = "";
  for ($i=0;$i<$fullWeeks;$i++) {
    $cal = $cal.'<tr>';
    for ($j=0;$j<7;$j++) {
      $actday++;
      $cal = $cal.make_day($actday, $month, $year, $month_events);
    }
    $cal = $cal.'</tr>';
  }
  $cal .= last_week($month, $year, $actday, $month_events);

  $cal .= "</table>";
return $cal;

}


?>
