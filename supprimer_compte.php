<?php require 'bbd_connexion.php'; 
    if (isset($_SESSION['id']) AND $_SESSION['id'] != 0) {
    	$delete_friends = $bdd->query ('DELETE FROM membres WHERE id ='.$_SESSION['id']);
    	$delete_friends = $bdd->query ('DELETE FROM objectifs WHERE id_membres ='.$_SESSION['id']);
        $delete_friends = $bdd->query ('DELETE FROM friends WHERE id_friends_1 ='.$_SESSION['id']);
        $delete_friends = $bdd->query ('DELETE FROM friends WHERE id_friends_2 ='.$_SESSION['id']);
    	$delete_friends->closeCursor();
    	$_SESSION = array();
		session_destroy();
    	header('Location:connexion.php');
    	exit();
    }
    echo "Vous n'êtes pas connecté";
?>