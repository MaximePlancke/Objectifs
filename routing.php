<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$template = null;

$config_routing = array(
  	'log_in' => array(
    	'module' => 'account',
    	'action' => 'log_in',
    	'url' => 'log_in.html'
  	),
  	'registration' => array(
    	'module' => 'account',
    	'action' => 'registration',
    	'url' => 'registration.html'
  	),
  	'log_out' => array(
    	'module' => 'account',
    	'action' => 'log_out',
    	'url' => 'log_out.html'
  	),
  	'delete_account' => array(
    	'module' => 'account',
    	'action' => 'delete_account',
    	'url' => 'delete_account.html'
  	),
  	'current_obj' => array(
    	'module' => 'user',
    	'action' => 'current_obj',
    	'url' => '^current_obj-([0-9]*)\.html$'
  	),
  	'current_obj_advices' => array(
    	'module' => 'user',
    	'action' => 'current_obj_advices',
    	'url' => 'current_obj_advices.html'
  	),
    'add_advice' => array(
    	'module' => 'user',
    	'action' => 'add_advice',
    	'url' => 'add_advice.html'
  	),
  	'add_friends' => array(
    	'module' => 'user',
    	'action' => 'add_friends',
    	'url' => 'add_friends.html'
  	),
  	'new_objective' => array(
    	'module' => 'objective',
    	'action' => 'new_objective',
    	'url' => 'new_objective.html'
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