<?php
$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id_friends_1 = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$id_friends_2 = $_POST['id_friend'];

	if (isset($_POST['add'])) {

		//Control (already friends)
		$request = $bdd->prepare('SELECT id_friends_1, id_friends_2 FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2 OR (id_friends_1 = :id_friends_2 AND id_friends_2 = :id_friends_1)');
		$request->execute(array(
		'id_friends_1' => $id_friends_1,
		'id_friends_2' => $id_friends_2));
		$count = $request->rowCount(); 
		$request->closeCursor();

		//Control (add yourself)
		if ($id_friends_1 == $id_friends_2) {
			array_push($errors, "Vous ne pouvez pas être ami avec vous même");
		} elseif($count >= 1) {
			// Pseudo déjà utilisé 
			array_push($errors, "Vous êtes déjà ami"); 
		} else {
			//Ajout du lien d'amitié
			$request = $bdd->prepare('INSERT INTO friends(id_friends_1, id_friends_2, accepted, date_friends) VALUES (:id_friends_1, :id_friends_2, 0, NOW())');
			$request->execute(array(
			    'id_friends_1' => $id_friends_1,
			    'id_friends_2' => $id_friends_2));
			$request->closeCursor();
			}
	} elseif (isset($_POST['delete'])) {
	$request = $bdd->prepare('DELETE FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2 OR(id_friends_2 = :id_friends_1 AND id_friends_1 = :id_friends_2)');
	$request->execute(array(
		'id_friends_1' => $id_friends_1,
	    'id_friends_2' => $id_friends_2));
	$request->closeCursor();
	} 
}
?>