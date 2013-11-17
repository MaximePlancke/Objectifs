<?php

$id_member = $_GET["id"];
$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;

//delete objetive
if ($id_objective AND $_GET['action'] == "delete") {
	if ($id_member != $_SESSION['id']) {
		array_push($errors, "Vous n'avez pas les droits pour cette action");
	}else{
		$request = $bdd->prepare('DELETE FROM objectifs WHERE id = ?');
		$request->execute(array($id_objective));
		$delete_objective = $request->fetchAll();
		array_push($success, "l'objectif a été supprimé");
		$request->closeCursor();
	}
}
// Get objective.
$request = $bdd->prepare('SELECT id, id_membres, name_obj, nb_steps FROM objectifs WHERE id_membres = ? AND done = 1 ORDER BY id DESC');
$request->execute(array($id_member));
$objectives = $request->fetchAll();
$request->closeCursor();

?>