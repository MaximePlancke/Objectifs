<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

	$id_member = $_GET["id"];
	$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
	$errors = array();

	//delete objetive
	if ($id_objective AND $_GET['action'] == "delete") {
		if ($id_member != $_SESSION['id']) {
			array_push($errors, "Vous n'avez pas les droits pour cette action");
		}else{
			$request = $bdd->prepare('DELETE FROM objectifs WHERE id = ?');
			$request->execute(array($id_objective));
			$delete_objective = $request->fetchAll();
			array_push($errors, "l'objectif a été supprimé");
			$request->closeCursor();
		}
	}
	// Get objective.
    $request = $bdd->prepare('SELECT id, id_membres, name_obj, nb_steps FROM objectifs WHERE id_membres = ? ORDER BY id DESC');
    $request->execute(array($id_member));
    $objectives = $request->fetchAll();
	$request->closeCursor();

?>

<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="UTF-8">
	    <title>Motivation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="/ressources/style.css">
		<link rel="stylesheet" href="/ressources/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/ressources/bootstrap/css/bootstrap.css" media="screen"> 
		<link rel="stylesheet" href="/ressources/bootstrap/css/bootstrap-responsive.min.css" type="text/css">
	</head>
  	<body>
	<div id="container-fluid">

		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>

		<section id="main_page" class="row-fluid">

			<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>

			<div id="page_right">
				<h3>Objectifs en cours</h3>
				<div>
					<?php foreach ($errors as $value): ?>
					<h5><?php echo $value; ?></h5><br/>
					<?php endforeach ?>
					<ul>
						<?php foreach ($objectives as $datas): ?>
							<li>
								<h4><?php echo $datas['name_obj']; ?></h4>
								<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5> 
								<h6><a href="/user/add_advice.php?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>">Donner un conseil</a></h6>
								<h6><a href="/user/current_obj_advices.php?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>">Voir les conseils</a></h6>
								<h6><a href="/user/current_obj.php?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>&amp;action=delete">Supprimer</a></h6>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>

		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>

	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>