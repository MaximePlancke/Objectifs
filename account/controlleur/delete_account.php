<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($user_id) {

	$user = new User($bdd);
	$user->setId($user_id);

	$user->delete();
	
	$_SESSION = array();
	session_destroy();
	header('Location:/account/registration');
	exit();
}
header('Location:/account/registration');
exit();
?>