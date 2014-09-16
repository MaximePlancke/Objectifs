<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_member 		= isset($_POST['id_member']) ? $_POST['id_member'] : null;
$id_friends_2 	= isset($_POST['id_friend_button']) ? $_POST['id_friend_button'] : null;
$target_event 	= isset($_POST['target_event']) ? $_POST['target_event'] : null;

$friend = new Friend($bdd);
$friend->setIdFriend1($id_member);
$friend->setIdFriend2($id_friends_2);

if ($id_member == $_SESSION['id']) {
	if ($target_event == 'friend_request_ok') {
			//add friend link
			$friend->confirm_add();
			echo "Vous êtes maintenant ami";
	} elseif ($target_event == 'delete_friend_button') {
		//delete friend link
		$friend->delete();
		echo "Vous venez de supprimer un ami";
	} 
}
?>