<?php

$id_member 	  = isset($_GET['id']) ? $_GET['id'] : null;
$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;

$objective = new Objective($bdd);
$objective->setIdMember($id_member);
$objective->setId($id_objective);

$steps_objective = new StepsObjective($bdd);
$advices_objective = new Advice($bdd);

// Get objective.
$objectives = $objective->readFollow($user_id);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read($user_id);

?>