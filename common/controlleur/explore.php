<?php

$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$id_advice    = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;

$objective = new Objective($bdd);

$steps_objective = new StepsObjective($bdd);

$advices_objective = new Advice($bdd);

// Get objective.
$objectives = $objective->readAll($user_id);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read($user_id);
?>