<?php
require_once("./libs/Smarty.class.php");
require_once("./helpers.php");


function create_month($month, $year) {
  $first_day = getdate(mktime(0, 0, 0, $month, 1, $year));
  $last_day = getdate(mktime(0, 0, 0, $month+1, 0, $year));
  $cal = "<tr>";
  $first_wday = ($first_day['wday']==0)?(7):($first_day['wday']);

  for($i = 1; $i < $first_wday; $i++){
    $cal = $cal.'<td>&nbsp;</td>';
  }

  $actday = 0;
  for($i = $first_wday; $i <= 7; $i++){
    $actday++;
    $cal = $cal."<td>$actday</td>";
  }
  $cal = $cal.'</tr>';

  $fullWeeks = floor(($last_day['mday']-$actday)/7);

  for ($i=0;$i<$fullWeeks;$i++){
    $cal = $cal.'<tr>';
    for ($j=0;$j<7;$j++){
      $actday++;
      $cal = $cal."<td>$actday</td>";
    }
    $cal = $cal.'</tr>';
  }

  if ($actday < $last_day['mday']){
    $cal = $cal.'<tr>';

    for ($i=0; $i<7;$i++){
      $actday++;
      if ($actday <= $last_day['mday']){
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





$today = getdate();

$smarty->assign('today', getdate());
$smarty->assign('cal', create_month($today['mon'], $today['year']));
$smarty->display('templates_c/index.tpl');

?>
