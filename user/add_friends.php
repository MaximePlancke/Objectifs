<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

// On recupère la requete dans menu_left pour afficher la liste des utilisateurs. 

$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_friends_1']) && isset($_GET['id_friends_2'])){

	$id_friends_1 = (int)$_GET['id_friends_1'];
	$id_friends_2 = (int)$_GET['id_friends_2'];

	if ($_GET['fonction']=="add") {

		//Vérification (already friends)
		$request = $bdd->prepare('SELECT id_friends_2, id_friends_1 FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2');
		$request->execute(array(
		'id_friends_1' => $id_friends_1,
		'id_friends_2' => $id_friends_2));
		$count = $request->rowCount(); 
		$request->closeCursor();

		//Vérification (ajout yourself)
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
			//Ajout du lien d'amitié dans l'autre sens 
			$request = $bdd->prepare('INSERT INTO friends(id_friends_1, id_friends_2, accepted, date_friends) VALUES (:id_friends_1, :id_friends_2, 0, NOW())');
			$request->execute(array(
			    'id_friends_1' => $id_friends_2,
			    'id_friends_2' => $id_friends_1));
				array_push($errors, "Vous êtes maintenant ami avec le membre d'id: $id_friends_2");
			$request->closeCursor();
			}
	} elseif ($_GET['fonction']=="delete") {
	$request = $bdd->prepare('DELETE FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2');
	$request->execute(array(
		'id_friends_1' => $id_friends_1,
	    'id_friends_2' => $id_friends_2));
	$request->closeCursor();
	$request = $bdd->prepare('DELETE FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2');
	$request->execute(array(
		'id_friends_1' => $id_friends_2,
	    'id_friends_2' => $id_friends_1));
	$request->closeCursor();
	} 
}
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Motivation</title>
	<!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/ressources/style.css">
	<!-- Intégration du CSS Bootstrap, Font-Awesome et Polices-->
	<link href="/ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="/ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/ressources/font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>
		<div id="page_right">
			<h2>Qui voulez vous ajouter?</h2>
				<ul>
					<?php foreach ($errors as $value): ?>
						<li>
							<?php echo $value; ?>
						</li>
					<?php endforeach ?>
				</ul>
				<?php foreach ($list_users as $datas) : ?>
				<h4><?php echo $datas['pseudo'];?>
					<a href="/add_friends.php?id_friends_1=<?php echo $_SESSION['id']; ?>&amp;id_friends_2=<?php echo $datas['id']; ?>&amp;fonction=add">  Ajouter</a>
					<a href="/add_friends.php?id_friends_1=<?php echo $_SESSION['id']; ?>&amp;id_friends_2=<?php echo $datas['id']; ?>&amp;fonction=delete">  Supprimer</a>
				</h4>
				<?php endforeach ?>
		</div>
	</section>
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>
	</div>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
