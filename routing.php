<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'home' ; 
$template = null;

$array = array();

if ($page == 'log_in' OR $page == 'registration' OR $page == 'log_out' OR $page == 'delete_account') {
	$configRouting = array(
	  	'routing' => array(
	    	'module' => '/account',
	    	'action' => $page
	  	)
	);
} elseif ($page == 'current_obj' OR $page == 'current_obj_advices' OR $page == 'add_advice' OR $page == 'add_friends') {
	$configRouting = array(
	  	'routing' => array(
	    	'module' => '/user',
	    	'action' => $page
	  	)
	);
} elseif ($page == 'new_objective') {
	$configRouting = array(
	  	'routing' => array(
	    	'module' => '/objective',
	    	'action' => $page
	  	)
	);
} else
	$configRouting = array(
	  	'routing' => array(
	    	'module' => '/home',
	    	'action' => $page
	  	)
	);

include ($_SERVER['DOCUMENT_ROOT'].$configRouting["routing"]["module"]."/controlleur/".$configRouting["routing"]["action"].".php");
$template = $_SERVER['DOCUMENT_ROOT'].$configRouting["routing"]["module"]."/template/".$configRouting["routing"]["action"].".php";

?>