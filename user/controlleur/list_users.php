<?php

$id_friends_2 = isset($_POST['id_friend_button']) ? $_POST['id_friend_button'] : null;
	
$user = new User($bdd);
$user->setId($user_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$friend = new Friend($bdd);
	$friend->setIdFriend1($user_id);
	$friend->setIdFriend2($id_friends_2);

	if (isset($_POST['add_friend_button'])) {
		//Control (already friends)
		$count = $friend->checkAlreadyFriend();
		//Control (add yourself)
		if ($user_id == $id_friends_2) {
			array_push($errors, "Vous ne pouvez pas être ami avec vous même");
		} elseif($count >= 1) {
			// name already used 
			array_push($errors, "Vous êtes déjà ami ou une demande a déjà été envoyé"); 
		} else {
			//add friend link
			$friend->request_add();
			}
	} elseif (isset($_POST['delete_friend_button'])) {
		//delete friend link
		$friend->delete();
	} 
}

$list_users = $user->listUsers();
?>