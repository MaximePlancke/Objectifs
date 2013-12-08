<?php 

$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_friends_2 = isset($_POST['id_friend_button']) ? $_POST['id_friend_button'] : null;

$user = new User();
$user->setDb($bdd);
$user->setId($user_id);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$friend = new Friend();
	$friend->setIdFriend1($user_id);
	$friend->setIdFriend2($id_friends_2);
	$friend->setDb($bdd);

	if (isset($_POST['friend_request_ok_x'])) {
			//add friend link
			$friend->confirm_add();
			array_push($success, "Vous êtes maintenant ami");
	} elseif (isset($_POST['delete_friend_button_x'])) {
		//delete friend link
		$friend->delete();
		array_push($success, "Vous venez de supprimer un ami");
	} 
}

$list_friends_request = $user->listRequestFriends();
$list_friends_accepted = $user->listFriends();

?>