<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($user_id) {

	$user = new User(array());
	$user->setId($user_id);

	$manager = new UserManager($bdd);
	$manager->delete($user);
	
	$_SESSION = array();
	session_destroy();
	header('Location:/account/registration');
	exit();
}
header('Location:/account/registration');
exit();
?>