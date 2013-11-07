<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$module = '/home';
$template = null;

$config_routing = array(
  	'log_in' => array(
    	'module' => '/account',
    	'action' => 'log_in'
  	),
  	'registration' => array(
    	'module' => '/account',
    	'action' => 'registration'
  	),
  	'log_out' => array(
    	'module' => '/account',
    	'action' => 'log_out'
  	),
  	'delete_account' => array(
    	'module' => '/account',
    	'action' => 'delete_account'
  	),
  	'current_obj' => array(
    	'module' => '/user',
    	'action' => 'current_obj'
  	),
  	'current_obj_advices' => array(
    	'module' => '/user',
    	'action' => 'current_obj_advices'
  	),
    'add_advice' => array(
    	'module' => '/user',
    	'action' => 'add_advice'
  	),
  	'add_friends' => array(
    	'module' => '/user',
    	'action' => 'add_friends'
  	),
  	'new_objective' => array(
    	'module' => '/objective',
    	'action' => 'new_objective'
  	),
  	'home' => array(
    	'module' => '/home',
    	'action' => 'home'
  	)
);

$param_routing = $config_routing[$page];
$module = $param_routing['module'];
$action = $param_routing['action'];

include ($_SERVER['DOCUMENT_ROOT'].$module."/controlleur/".$action.".php");
$template = $_SERVER['DOCUMENT_ROOT'].$module."/template/".$action.".php";

?>