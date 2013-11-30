<?php 

$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$id_advice = isset($_GET['id_advice']) ? $_GET['id_advice'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

//delete advice
if ($id_advice AND $_GET['action'] == "delete") {
	if ($id_member == $_SESSION['id'] OR $_GET['id_member_give_advice'] == $_SESSION['id']) {
		$advice = new Advice();
		$advice->setId($id_advice);
		$advice->setDb($bdd);
		$advice->delete();
		array_push($success, "l'objectif a été supprimé");
	} else {
		array_push($errors, "Vous n'avez pas les droits pour cette action");
	}
}

// Get advices from objective selected.
$advices = $objective->showAdvices();

//Read objective selected
$objective_name = $objective->readOne();

?>