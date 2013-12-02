<?php

$id_member = $_GET["id"];
$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

$steps_objective = new StepsObjective();
$steps_objective->setDb($bdd);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	//delete objetive
	if ($id_objective AND isset($_POST['delete'])) {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->delete();
			array_push($success, "l'objectif a été supprimé");
		}
	}

	if ($id_objective AND isset($_POST['done'])) {
		if ($id_member != $_SESSION['id']) {
				array_push($errors, "Vous n'avez pas les droits pour cette action");
			}else{
				$objective->updateStatus(1);
				array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
		}
	}
}

// Get objective.
$objectives = $objective->read(0);

$steps_objectives = $steps_objective->read();


?>