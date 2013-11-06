<?php 
	$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
	$id_member = isset($_GET['id']) ? $_GET['id'] : null;

	// Get objective.
    $request = $bdd->prepare(
    	'SELECT a.*, m.pseudo, m.id FROM advices AS a INNER JOIN membres AS m 
    	ON m.id = a.id_member_give_advice
    	AND a.id_objective = ? 
    	ORDER BY a.id DESC');
    $request->execute(array($id_objective));
    $advices = $request->fetchAll();
	$request->closeCursor();
	$request = $bdd->prepare('SELECT name_obj FROM objectifs WHERE id = ?');
    $request->execute(array($id_objective));
    $name_objective = $request->fetchAll();
	$request->closeCursor();
?>