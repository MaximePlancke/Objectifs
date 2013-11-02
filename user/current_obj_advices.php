<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

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
				<?php foreach ($name_objective as $datas) { ?>
						<h3><?php echo $datas['name_obj'];?></h3>
				<?php } ?>
				<div>
					<ul>
						<?php foreach ($advices as $datas): ?>
							<li>
								<h4><?php echo $datas['advice_content']; ?></h4>
								<h5>Ajouté par : <a href="/user/current_obj.php?id=<?php echo $datas['id'];?>"><?php echo $datas['pseudo'];?></a> le <?php echo $datas['date_creation'];?></h5>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<a href="/user/current_obj.php?id=<?php echo $id_member;?>">Revenir aux objectifs</a>
			</div>
		</section>

		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>

	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>