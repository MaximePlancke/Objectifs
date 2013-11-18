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

if ($id_objective AND $_GET['action'] == "obj_done") {
	if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$request = $bdd->prepare('UPDATE objectifs SET done = 1 WHERE id = ?');
			$request->execute(array($id_objective));
			$move_done_objective = $request->fetchAll();
			array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
			$request->closeCursor();
	}
}
// Get objective.
$request = $bdd->prepare('SELECT id, id_membres, name_obj, nb_steps FROM objectifs WHERE id_membres = ? AND done = 0 ORDER BY id DESC');
$request->execute(array($id_member));
$objectives = $request->fetchAll();
$request->closeCursor();

?>