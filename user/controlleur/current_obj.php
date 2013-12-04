<?php

$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$id_advice = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;

$user = new User();
$user->setId($id_member);
$user->setDb($bdd);
// get User
$user_name = $user->read();

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

$steps_objective = new StepsObjective();
$steps_objective->setDb($bdd);

$advices_objective = new Advice();
$advices_objective->setDb($bdd);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	//delete objetive
	if ($id_objective AND isset($_POST['delete_objective'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->delete();
			array_push($success, "l'objectif a été supprimé");
		}
	}

	if ($id_objective AND isset($_POST['done_objective'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->updateStatus(1);
			array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
		}
	}
	
	if ($id_advice AND isset($_POST['delete_advice'])) {
		if ($id_member == $_SESSION['id'] OR $_POST['id_member_give_advice'] == $_SESSION['id']) {
			$advices_objective->setId($id_advice);
			$advices_objective->setDb($bdd);
			$advices_objective->delete();
			array_push($success, "le conseil a été supprimé");
		} else {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}
	}

}

// Get objective.
$objectives = $objective->read(0);

$steps_objectives = $steps_objective->read();

// Get advices from objective selected.
$advices = $objective->showAdvices();
$advices_objectives = $advices_objective->read();

?>