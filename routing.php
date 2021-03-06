<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$template = null;

if (!$user_id AND $page != 'home' AND $page != 'registration' ) {
  $page = 'log_in';
}

$config_routing = array(
  	'log_in' => array(
    	'module' => 'account',
    	'action' => 'log_in',
    	'url' => 'account/login'
  	),
  	'registration' => array(
    	'module' => 'account',
    	'action' => 'registration',
    	'url' => 'account/registration'
  	),
  	'log_out' => array(
    	'module' => 'account',
    	'action' => 'log_out',
    	'url' => 'account/logout'
  	),
  	'delete_account' => array(
    	'module' => 'account',
    	'action' => 'delete_account',
    	'url' => 'account/delete_account'
  	),
    'friends' => array(
      'module' => 'account',
      'action' => 'friends',
      'url' => 'account/friends'
    ),
    'messages' => array(
      'module' => 'account',
      'action' => 'messages',
      'url' => 'account/messages'
    ),
    'request' => array(
      'module' => 'account',
      'action' => 'request',
      'url' => 'account/request'
    ),
    'explore' => array(
      'module' => 'common',
      'action' => 'explore',
      'url' => 'common/explore'
    ),
    'profile' => array(
      'module' => 'user',
      'action' => 'profile',
      'url' => 'user/profile'
    ),
    'follow_objective' => array(
      'module' => 'user',
      'action' => 'follow_objective',
      'url' => 'user/follow_objective'
    ),
    'objective_one' => array(
      'module' => 'user',
      'action' => 'objective_one',
      'url' => 'user/objective_one'
    ),
  	'current_obj' => array(
    	'module' => 'user',
    	'action' => 'current_obj',
    	'url' => 'user/current_obj-([0-9]*)'
  	),
    'done_obj' => array(
      'module' => 'user',
      'action' => 'done_obj',
      'url' => 'user/done_obj-([0-9]*)'
    ),
  	'current_obj_advices' => array(
    	'module' => 'user',
    	'action' => 'current_obj_advices',
    	'url' => 'user/current_obj_advices'
  	),
    'add_advice' => array(
    	'module' => 'user',
    	'action' => 'add_advice',
    	'url' => 'user/add_advice'
  	),
  	'list_users' => array(
    	'module' => 'user',
    	'action' => 'list_users',
    	'url' => 'user/list_users'
  	),
  	'new_objective' => array(
    	'module' => 'objective',
    	'action' => 'new_objective',
    	'url' => 'objective/new_objective'
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