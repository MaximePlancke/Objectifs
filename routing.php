<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$template = null;

$config_routing = array(
  	'log_in' => array(
    	'module' => 'account',
    	'action' => 'log_in',
    	'url' => 'login'
  	),
  	'registration' => array(
    	'module' => 'account',
    	'action' => 'registration',
    	'url' => 'registration'
  	),
  	'log_out' => array(
    	'module' => 'account',
    	'action' => 'log_out',
    	'url' => 'logout'
  	),
  	'delete_account' => array(
    	'module' => 'account',
    	'action' => 'delete_account',
    	'url' => 'delete_account'
  	),
  	'current_obj' => array(
    	'module' => 'user',
    	'action' => 'current_obj',
    	'url' => 'current_obj-([0-9]*)'
  	),
  	'current_obj_advices' => array(
    	'module' => 'user',
    	'action' => 'current_obj_advices',
    	'url' => 'current_obj_advices'
  	),
    'add_advice' => array(
    	'module' => 'user',
    	'action' => 'add_advice',
    	'url' => 'add_advice'
  	),
  	'add_friends' => array(
    	'module' => 'user',
    	'action' => 'add_friends',
    	'url' => 'add_friends'
  	),
  	'new_objective' => array(
    	'module' => 'objective',
    	'action' => 'new_objective',
    	'url' => 'new_objective'
  	),
  	'home' => array(
    	'module' => 'home',
    	'action' => 'home',
    	'url' => ''
  	)
);

$param_routing = $config_routing[$page];
$module = $_SERVER['DOCUMENT_ROOT']."/".$param_routing['module'];
$action = $param_routing['action'].".php";

include ($module."/controlleur/".$action);
$template = $module."/template/".$action;

?>