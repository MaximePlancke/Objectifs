<?php 

$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
$id_member = isset($_GET['id']) ? $_GET['id'] : null;

$objective = new Objective();
$objective->setIdMember($id_member);
$objective->setId($id_objective);
$objective->setDb($bdd);

// Get objective.
$request = $bdd->prepare(
	'SELECT a.*, m.pseudo, m.id FROM advices AS a INNER JOIN membres AS m 
	ON m.id = a.id_member_give_advice
	AND a.id_objective = ? 
	ORDER BY a.id DESC');
$request->execute(array($id_objective));
$advices = $request->fetchAll();
$request->closeCursor();

$objective_name = $objective->readOne();
?>