<?php
require_once("./helpers.php");

function make_day($day, $month, $year) {
  $date = "$year-$month-$day";
  $events_query = "select * from ride_event where date(when_datetime) = '$date'";
  $day_events = table_content($events_query);
  $today = getdate();
  $has_event = count($day_events);
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
    $day_html = "<td id='today'><strong>$day<strong></td>";
    return $day_html;
  }

  $day_html = "<td>$day</td>";
  return $day_html;
}


function first_week($month, $year) {
  $first_day = getdate(mktime(0, 0, 0, $month, 1, $year));
  $first_wday = ($first_day['wday']==0)?(7):($first_day['wday']);
  $cal = "<tr>";

  for($i = 1; $i < $first_wday; $i++) {
    $cal = $cal.'<td>&nbsp;</td>';
  }
  $actday = 0;
  for($i = $first_wday; $i <= 7; $i++) {
    $actday++;
    $cal = $cal.make_day($actday, $month, $year);
  }
  $cal = $cal.'</tr>';
  return array($cal, $actday);
}


function last_week($month, $year, $actday) {
  $cal = "";
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  if ($actday < $last_day['mday']) {
    $cal = '<tr>';

    for ($i=0; $i<7;$i++) {
      $actday++;
      if ($actday <= $last_day['mday']) {
	$cal = $cal.make_day($actday, $month, $year);
      }
      else {
	$cal = $cal.'<td>&nbsp;</td>';
      }
    }

    $cal = $cal.'</tr>';
  }
  return $cal;
}

function navigation($month, $year) {
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
  $nav = "<a href='{$_SERVER["SCRIPT_NAME"]}/calendar/$prev_month/$prev_year/'>&lt;&lt;</a>";
  $nav = $nav."<a href='{$_SERVER["SCRIPT_NAME"]}/calendar/$next_month/$next_year/'>&gt;&gt;</a>";
  return $nav;

}

// $arr = array($month, $year)
function create_month($arr) {
  $today = getdate();
  if(count($arr)!=2) {
    $month = $today['mon'];
    $year = $today['year'];
  }
  else {
    $month = $arr[0];
    $year = $arr[1];
  }
  $cal = "
  <table>
    <tr>
	<tr><th colspan='7'>$month - $year</th></tr>
    </tr>
    <tr>
      <td>П</td><td>В</td><td>С</td><td>Ч</td><td>П</td><td>С</td><td>Н</td>
    </tr>
  ";
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  $first_week = first_week($month, $year);
  $cal = $cal.$first_week[0];
  $actday = $first_week[1];
  $fullWeeks = floor(($last_day['mday']-$actday)/7);

  for ($i=0;$i<$fullWeeks;$i++) {
    $cal = $cal.'<tr>';
    for ($j=0;$j<7;$j++) {
      $actday++;
      $cal = $cal.make_day($actday, $month, $year);
    }
    $cal = $cal.'</tr>';
  }
  $cal = $cal.last_week($month, $year, $actday);

  $cal = $cal."</table>";
  $cal = $cal.navigation($month, $year);

  //TODO:  if user is logged in -> $user_cal

  return array(
    'assign' => array('cal' => $cal, 'today' => $today),
    'display' => 'templates_c/index.tpl');
}

?>
