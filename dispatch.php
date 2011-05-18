<?php

require_once('./urls.php');
require_once('./helpers.php');

/*
Dispatch function - delegates action to other function and passes parameters to it
 */
function dispatch() {

  global $smarty;
  global $routes;

  //stear clear, allow only leters, numbers and slashes
  if(!empty($raw_route) and preg_match('/^[\p{L}\/\d]++$/uD', $_SERVER["PATH_INFO"]) == 0) {
    die("Invalid URL");
  }

  function not_empty($var) {
    return !empty($var);
  }

  //extract parameters
  $url_pieces = explode("/",$_SERVER["PATH_INFO"]);
  $action = $url_pieces[1];
  $params = array();
  if(count($url_pieces)>2) {
    $params = array_slice($url_pieces, 2);
  }
  $params = array_filter($params, "not_empty");

  //when no action is passed default action is performed
  if(empty($action)) {
    $action = "default";
  }

  //make sure the route is defined
  if(!in_array($action, array_keys($routes))) {
    die("Nothing to see here");
  }

  //all checked, execute requested funcion with provided parameters
  $action_function = $routes[$action];
  
  $results = $action_function($params);
  foreach($results['assign'] as $res_name => $res_value) {
    $smarty->assign($res_name, $res_value);
  }
  $smarty->display($results['display']);
  
  $action_function($params);

}

dispatch();
?>
