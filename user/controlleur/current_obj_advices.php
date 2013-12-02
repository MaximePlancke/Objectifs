<?php 

$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$id_advice = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

//delete advice
if (isset($_POST['delete'])) {
	if ($id_member == $_SESSION['id'] OR $_POST['id_member_give_advice'] == $_SESSION['id']) {
		$advice = new Advice();
		$advice->setId($id_advice);
		$advice->setDb($bdd);
		$advice->delete();
		array_push($success, "le conseil a été supprimé");
	} else {
		array_push($errors, "Vous n'avez pas les droits pour cette action");
	}
}

// Get advices from objective selected.
$advices = $objective->showAdvices();

//Read objective selected
$objective_name = $objective->readOne();

?>