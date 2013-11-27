<?php 

$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
$id_member = isset($_GET['id']) ? $_GET['id'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

// Get advices from objective selected.
$advices = $objective->showAdvices();

//Read objective selected
$objective_name = $objective->readOne();
?>