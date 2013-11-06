<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($user_id) {
    	$delete_user = $bdd->query ('DELETE FROM membres WHERE id ='.$user_id);
        $delete_user->closeCursor();
    	$_SESSION = array();
		session_destroy();
    	header('Location:/index.php?page=registration');
    	exit();
    }
    echo "Vous n'êtes pas connecté";
?>