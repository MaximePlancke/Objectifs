<?php

$id_member 	  = isset($_GET['id']) ? $_GET['id'] : null;
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

	//obective done
	if ($id_objective AND isset($_POST['done_objective_x'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->updateStatus(1);
			array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
		}
	}

	//add new advice
	if (isset($_POST['new_advice'])) {
		$advice_content = isset($_POST['new_advice']) ? $_POST['new_advice'] : null;
		$id_member_give_advice = isset($_SESSION['id']) ? $_SESSION['id'] : null;

		$add_advice = new Advice($bdd);
		$add_advice->setIdMemberGiveAdvice($id_member_give_advice);
		$add_advice->setAdviceContent($advice_content);
		$add_advice->setIdObjective($id_objective);

		if ($id_member_give_advice AND $id_objective AND $advice_content) {
			$add_advice->add();
			array_push($errors, "Votre conseil sera visible une fois accepté par la personne ayant crée l'objectif");
		} else {
			array_push($errors, "Vous n'êtes pas connecté, Veuillez vous connecter.");
		}
	}
}
// get User
$user_name = $user->read();
// Get objective.
$current_objectives = $objective->read(0);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read();
?>