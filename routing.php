<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$module = '/home';
$template = null;

if ($page == 'log_in' OR $page == 'registration' OR $page == 'log_out' OR $page == 'delete_account') {$module = '/account';}
if ($page == 'current_obj' OR $page == 'current_obj_advices' OR $page == 'add_advice' OR $page == 'add_friends') {$module = '/user';}
if ($page == 'new_objective') {$module = '/objective';}

$configRouting = array(
  	'routing' => array(
    	'module' => $module,
    	'action' => $page
  	)
);

include ($_SERVER['DOCUMENT_ROOT'].$configRouting["routing"]["module"]."/controlleur/".$configRouting["routing"]["action"].".php");
$template = $_SERVER['DOCUMENT_ROOT'].$configRouting["routing"]["module"]."/template/".$configRouting["routing"]["action"].".php";

?>