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

function create_month($month=NULL, $year=NULL) {
  $today = getdate();
  if($month==NULL || $year==NULL) {
    $month = $today['mon'];
    $year = $today['year'];
  }
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  $first_week = first_week($month, $year);
  $cal = $first_week[0];
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

  return array(
    'assign' => array('cal' => $cal, 'today' => $today),
    'display' => 'templates_c/index.tpl');
}

?>
