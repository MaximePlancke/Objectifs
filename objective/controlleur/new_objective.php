<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_mem   = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$name_obj = isset($_POST['name_obj']) ? $_POST['name_obj'] : null;
	$nb_steps = isset($_POST['nb_steps_add']) ? $_POST['nb_steps_add'] : 0;
	$category = isset($_POST['category']) ? $_POST['category'] : null;
	
	//create table for the steps content
	$steps_content = array();
	for ($i=1; $i < $nb_steps+1; $i++) { 
		array_push($steps_content, $_POST['step_'.$i]);
	}

	$objective = new Objective($bdd);
	$objective->setIdMember($id_mem);  
	$objective->setNameObjective($name_obj);
	$objective->setCategory($category);  
	$objective->setNbSteps($nb_steps);

	$steps_objective = new StepsObjective($bdd);
	$steps_objective->setStepsContent($steps_content);

	if (($id_mem AND $name_obj AND isset($nb_steps) AND isset($category))) {  
		$id_objective_for_steps = $objective->add(); 

		//add id objective to steps table
		$steps_objective->setIdObjective($id_objective_for_steps);
		$steps_objective->add($nb_steps);
		array_push($errors, "Objectif ajouté!");     
	} else {
		array_push($errors, "Veuillez vous connecter");
	}
}
?>