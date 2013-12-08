<?php

$id_friends_1 = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_friends_2 = isset($_POST['id_friend_button']) ? $_POST['id_friend_button'] : null;
	
$user = new User();
$user->setDb($bdd);
$user->setId($user_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$friend = new Friend();
	$friend->setIdFriend1($id_friends_1);
	$friend->setIdFriend2($id_friends_2);
	$friend->setDb($bdd);

	if (isset($_POST['add_friend_button'])) {
		//Control (already friends)
		$count = $friend->checkAlreadyFriend();
		//Control (add yourself)
		if ($id_friends_1 == $id_friends_2) {
			array_push($errors, "Vous ne pouvez pas être ami avec vous même");
		} elseif($count >= 1) {
			// name already used 
			array_push($errors, "Vous êtes déjà ami ou une demande a déjà été envoyé"); 
		} else {
			//add friend link
			$friend->request_add();
			array_push($success, "Une demande a été envoyé");
			}
	} elseif (isset($_POST['delete_friend_button'])) {
		//delete friend link
		$friend->delete();
		array_push($success, "Vous venez de supprimer un ami");
	} 
}

$list_users = $user->listUsers();

?>