<?php

$id_member    = isset($_GET['id']) ? $_GET['id'] : null;
$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;

$user = new User($bdd);
$user->setId($id_member);

$objective = new Objective($bdd);
$objective->setIdMember($id_member);
$objective->setId($id_objective);

$steps_objective = new StepsObjective($bdd);

$advices_objective = new Advice($bdd);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	//delete objetive
	if ($id_objective AND isset($_POST['delete_objective_x'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->delete();
			array_push($success, "l'objectif a été supprimé");
		}
	}

	//objective done
	if ($id_objective AND isset($_POST['done_objective_x'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->updateStatus(1);
			array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
		}
	}

	//objective not done anymore
	if ($id_objective AND isset($_POST['obj_modif_x'])) {
		if ($id_member != $_SESSION['id']) {
				array_push($errors, "Vous n'avez pas les droits pour cette action");
			}else{
				$objective->updateStatus(0);
				array_push($success, "Votre objectif a été déplacé dans la section objectifs en cours");
		}
	}

	$friend = new Friend($bdd);
	$friend->setIdFriend1($user_id);
	$friend->setIdFriend2($id_member);

	if (isset($_POST['add_friend_button'])) {
		//Control (already friends)
		$count = $friend->checkAlreadyFriend();
		//Control (add yourself)
		if ($user_id == $id_member) {
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
// get User
$user_info = $user->read($user_id);
// Get objective.
$current_objectives = $objective->read5Last(0, $user_id);
$done_objectives = $objective->read5Last(1, $user_id);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read($user_id);
// Get 5 last advice from the profile
$last_advices_user = $advices_objective->read5Last($user_id, $id_member);
?>