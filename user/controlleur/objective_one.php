<?php

$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;

$objective = new Objective($bdd);
$objective->setId($id_objective);

$steps_objective = new StepsObjective($bdd);
$advices_objective = new Advice($bdd);

// Get objective.
$objectives = $objective->readOne($user_id);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read($user_id);

?>