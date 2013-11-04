<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_mem = isset($_SESSION['id']) ? $_SESSION['id'] : null;
	$name_obj = isset($_POST['name_obj']) ? $_POST['name_obj'] : null;
	$nb_steps = isset($_POST['nb_steps']) ? $_POST['nb_steps'] : null;

	if (($id_mem AND $name_obj AND $nb_steps)) {        
	    $request = $bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :nb_steps, NOW())');
	    $request->execute(array(
	        'id_mem' => $id_mem,
	        'name_obj' => $name_obj,
	        'nb_steps' => $nb_steps,
	        ));
	    $request->closeCursor();
	} else {
		array_push($errors, "Veuillez vous connecter");
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
		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>
			<div id="page_right">			
				<h4>Nouvel Objectif</h4>
				<form method="post" class="well form-inline" action="/objective/new_objective.php">
					<ul>
						<?php foreach ($errors as $value): ?>
							<li>
								<?php echo $value;?>
							</li>
						<?php endforeach ?>
					</ul>
					<br/>
					<p><label for="name_obj"/>Votre objectif</label><br/>
					<input type="text" id="name_obj" name="name_obj" autofocus required/>
					<br/><br/>
					<label for="nb_steps">Nombre d'étapes (Entre 1 et 15)</label><br/>
					<input type="number" id="nb_steps" name="nb_steps" min="0" max="15" value="1" step="1" onkeypress="return false;" />
					<br/><br/>
		       		<input type="submit" value="C'est parti!" class="btn btn-primary"/></p>
       			</form>
			</div>
		</section>
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>
	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>