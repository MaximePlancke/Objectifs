<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($user_id) {
    	$delete_user = $bdd->query ('DELETE FROM membres WHERE id ='.$user_id);
        $delete_user->closeCursor();
    	$delete_objective = $bdd->query ('DELETE FROM objectifs WHERE id_membres ='.$user_id);
        $delete_objective->closeCursor();
        $delete_friends = $bdd->prepare ('DELETE FROM friends WHERE id_friends_1 = :session AND id_friends_2 = :session');
        $delete_friends->execute(array(
            'session' => $user_id
            ));
    	$delete_friends->closeCursor();
    	$_SESSION = array();
		session_destroy();
    	header('Location:/account/log_in.php');
    	exit();
    }
    echo "Vous n'êtes pas connecté";
?>