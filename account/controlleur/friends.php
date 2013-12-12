<?php 

$id_member 		= isset($_GET['id']) ? $_GET['id'] : null;
$id_friends_2 	= isset($_POST['id_friend_button']) ? $_POST['id_friend_button'] : null;

$user = new User($bdd);
$user->setId($user_id);

$list_friends_request = $user->listRequestFriends();
$list_friends_accepted = $user->listFriends();

?>