<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_mem = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$name_obj = isset($_POST['name_obj']) ? $_POST['name_obj'] : null;
	$nb_steps = isset($_POST['nb_steps']) ? $_POST['nb_steps'] : null;

	if (($id_mem AND $name_obj AND $nb_steps)) {        
	    $request = $bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :nb_steps, NOW())');
	    $request->execute(array(
	        'id_mem' => $id_mem,
	        'name_obj' => $name_obj,
	        'nb_steps' => $nb_steps,
	        ));
	    $request->closeCursor();
	} else {
		array_push($errors, "Veuillez vous connecter");
	}
}
?>