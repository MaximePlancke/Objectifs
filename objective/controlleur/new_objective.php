<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_mem = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$name_obj = isset($_POST['name_obj']) ? $_POST['name_obj'] : null;
	$nb_steps = isset($_POST['nb_steps']) ? $_POST['nb_steps'] : null;

	$objective = new Objective();
	$objective->setIdMember($id_mem);  
	$objective->setNameObjective($name_obj);  
	$objective->setNbSteps($nb_steps);
	$objective->setDb($bdd);

	if (($id_mem AND $name_obj AND $nb_steps)) {  

		$objective->add();      
	} else {
		array_push($errors, "Veuillez vous connecter");
	}
}
?>