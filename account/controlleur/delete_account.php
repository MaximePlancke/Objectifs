<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$errors = array();

if ($user_id) {
	$delete_user = $bdd->query ('DELETE FROM membres WHERE id ='.$user_id);
    $delete_user->closeCursor();
	$_SESSION = array();
	session_destroy();
	header('Location:registration.html');
	exit();
}
header('Location:registration.html');
exit();
?>