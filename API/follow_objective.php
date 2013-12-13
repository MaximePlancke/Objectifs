<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$user_id				= isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_objective 			= isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$target_event 			= isset($_POST['target_event']) ? $_POST['target_event'] : null;

if($id_objective AND $target_event == 'follow_objective' AND $user_id) {
	$member_follow_objective = new MemberFollowObjective($bdd);
	$member_follow_objective->setIdObjective($id_objective);
	$member_follow_objective->setIdMember($user_id);
	$member_follow_objective->add();
	echo("Vous pouvez maintenant retrouver cet objectif dans le menu \" Mes favoris \"");
}

if($id_objective AND $target_event == 'unfollow_objective' AND $user_id) {
	$member_follow_objective = new MemberFollowObjective($bdd);
	$member_follow_objective->setIdObjective($id_objective);
	$member_follow_objective->setIdMember($user_id);
	$member_follow_objective->delete();
	echo("Vous ne suivez plus cet objectif");
}

?>