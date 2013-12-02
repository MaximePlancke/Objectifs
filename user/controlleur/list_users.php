<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id_friends_1 = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$id_friends_2 = $_POST['id_friend'];

	$friend = new Friend();
	$friend->setIdFriend1($id_friends_1);
	$friend->setIdFriend2($id_friends_2);
	$friend->setDb($bdd);

	if (isset($_POST['add'])) {
		//Control (already friends)
		$count = $friend->checkAlreadyFriend();
		//Control (add yourself)
		if ($id_friends_1 == $id_friends_2) {
			array_push($errors, "Vous ne pouvez pas être ami avec vous même");
		} elseif($count >= 1) {
			// name already used 
			array_push($errors, "Vous êtes déjà ami"); 
		} else {
			//add friend link
			$friend->add();
			array_push($success, "Vous venez d'ajouter un ami");
			}
	} elseif (isset($_POST['delete'])) {
		//delete friend link
		$friend->delete();
		array_push($success, "Vous venez de supprimer un ami");
	} 
}
?>