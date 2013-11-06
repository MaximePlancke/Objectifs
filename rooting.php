<?php 

$page = isset($_GET['page']) ? $_GET['page'] : null ; 
$template = null;

switch ($page) {
	case 'log_in';
	case 'registration';
	case 'log_out';
	case 'delete_account';
		include ($_SERVER['DOCUMENT_ROOT']."/account/controlleur/$page.php");
		$template = $_SERVER['DOCUMENT_ROOT']."/account/template/$page.php";
		break;
	case 'current_obj';
	case 'current_obj_advices';
	case 'add_advice';
	case 'add_friends';
		include ($_SERVER['DOCUMENT_ROOT']."/user/controlleur/$page.php");
		$template = ($_SERVER['DOCUMENT_ROOT']."/user/template/$page.php");
		break;
	case 'new_objective':
		include ($_SERVER['DOCUMENT_ROOT']."/objective/controlleur/$page.php");
		$template = ($_SERVER['DOCUMENT_ROOT']."/objective/template/$page.php");
		break;
	default:
		$template = ($_SERVER['DOCUMENT_ROOT']."/home.php");
		break;
}

?>