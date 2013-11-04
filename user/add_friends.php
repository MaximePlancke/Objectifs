<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

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
	$request = $bdd->prepare('DELETE FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2');
	$request->execute(array(
		'id_friends_1' => $id_friends_1,
	    'id_friends_2' => $id_friends_2));
	$request->closeCursor();
	} 
}
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Motivation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/ressources/style.css">
	<link href="/ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="/ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/ressources/font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); // Get back the request in menu_left to post the user list ?>
		<div id="page_right">
			<h2>Qui voulez vous ajouter?</h2>
				<ul>
					<?php foreach ($errors as $value): ?> 
						<li>
							<?php echo $value; ?>
						</li>
					<?php endforeach ?>
				</ul>
				<ul>
					<?php foreach ($list_users as $datas) : ?>
					<li>
						<?php echo $datas['pseudo'];?>
						<form method="post" action="/user/add_friends.php">
							<input type="hidden" name="id_friend" value="<?php echo $datas['id'];?>" />
							<input name="add" id="add" type="submit" value="Ajouter" class="btn btn-primary"/>
							<input name="delete" id="delete" type="submit" value="Supprimer" class="btn btn-primary"/>
						</form>
					</li>
					<?php endforeach ?>					
				</ul>
		</div>
	</section>
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>
	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
