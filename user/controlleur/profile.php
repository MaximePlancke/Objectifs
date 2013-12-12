<?php

$id_member    = isset($_GET['id']) ? $_GET['id'] : null;
$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$id_advice    = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;

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

}
// get User
$user_name = $user->read();
// Get objective.
$current_objectives = $objective->read5Last(0);
$done_objectives = $objective->read5Last(1);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read();
// Get 5 last advice from the profile
$last_advices_user = $advices_objective->read5Last();
?>