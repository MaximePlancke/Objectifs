<?php

$id_member = $_GET["id"];
$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

//delete objetive
if ($id_objective AND $_GET['action'] == "delete") {
	if ($id_member != $_SESSION['id']) {
		array_push($errors, "Vous n'avez pas les droits pour cette action");
	}else{
		$objective->delete();
		array_push($success, "l'objectif a été supprimé");
	}
}

if ($id_objective AND $_GET['action'] == "obj_modif") {
	if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$objective->updateStatus(0);
			array_push($success, "Votre objectif a été déplacé dans la section objectifs en cours");
	}
}
// Get objective.
$objectives = $objective->read(1);

?>