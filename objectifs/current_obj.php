<?php require '/connexion/bbd_connexion.php';

	$id_member = $_GET["id"];

	// Get objective.
    $request = $bdd->prepare('SELECT id_membres, name_obj, nb_steps FROM objectifs WHERE id_membres = ? ORDER BY id DESC');
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

		<?php include("../menus/menu_top.php"); ?>

		<section id="main_page" class="row-fluid">

			<?php include("../menus/menu_left.php"); ?>

			<div id="page_right">
				<h3>Objectifs en cours</h3>
				<div>
					<ul>
						<?php foreach ($objectives AS $datas): ?>
							<li>
								<h4><?php echo $datas['name_obj']; ?></h4>
								<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>

		<?php include("../menus/footer.php"); ?>

	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>