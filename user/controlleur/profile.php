<?php 

$id_member = isset($_GET['id']) ? $_GET['id'] : null;

$user = new User();
$user->setId($id_member);
$user->setDb($bdd);
// get User
$user_name = $user->read();

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setDb($bdd);

// Get objective.
$objectives = $objective->read(0);
?>