<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($user_id) {
	$delete_user = $bdd->query ('DELETE FROM membres WHERE id ='.$user_id);
    $delete_user->closeCursor();
	$_SESSION = array();
	session_destroy();
	header('Location:account-registration');
	exit();
}
header('Location:account-registration');
exit();
?>