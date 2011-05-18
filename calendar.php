<?php
require_once("./helpers.php");

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
    $cal = $cal."<td>$actday</td>";
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
	$cal = $cal."<td>$actday</td>";
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
  $nav = "<a href='/xampp/ride_with_us/dispatch.php/calendar/$prev_month/$prev_year/'>&lt;&lt;</a>";
  $nav = $nav."<a href='/xampp/ride_with_us/dispatch.php/calendar/$next_month/$next_year/'>&gt;&gt;</a>";
  return $nav;

}

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
      <td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td><td>Su</td>
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
      $cal = $cal."<td>$actday</td>";
    }
    $cal = $cal.'</tr>';
  }
  $cal = $cal.last_week($month, $year, $actday);

  $cal = $cal."</table>";
  $cal = $cal.navigation($month, $year);
  return array(
    'assign' => array('cal' => $cal, 'today' => $today),
    'display' => 'templates_c/index.tpl');
}

?>
