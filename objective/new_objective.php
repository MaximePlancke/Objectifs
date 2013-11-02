<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; ?>
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
				<h4>Nouvel Objectif</h4>
				<form method="post" class="well form-inline" action="/objective/add_objective.php">
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
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>