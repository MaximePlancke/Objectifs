<?php
$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$errors = array();
$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$advice_content = isset($_POST['name_advice']) ? $_POST['name_advice'] : null;
	$id_member_give_advice = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;

	if ($id_member_give_advice AND $id_objective AND $advice_content) {
		$request = $bdd->prepare('INSERT INTO advices(id_member_give_advice, id_objective, advice_content, date_creation) VALUES(:id_member_give_advice, :id_objective, :advice_content, NOW())');
		$request->execute(array(
			'id_member_give_advice' => $id_member_give_advice,
			'id_objective' => $id_objective,
			'advice_content' => $advice_content
			));
		$request->closeCursor();
		array_push($errors, "Votre conseil a bien été ajouté");
	} else {
		array_push($errors, "Vous n'êtes pas connecté, Veuillez vous connecter.");
	}
}
?>