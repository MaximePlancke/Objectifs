<?php require '../connexion/bbd_connexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Motivation</title>
    <!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Ressources/style.css">
    <!-- Intégration du CSS Bootstrap, Font-Awesome et Polices-->
	<link href="/Ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="/Ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/Ressources/font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include("../menus/menu_top.php"); ?>
		<section id="main_page" class="row-fluid">
		<?php include("../menus/menu_left.php"); ?>
			<div id="page_right">			
				<h4>Nouvel Objectif</h4>
				<form method="post" class="well form-inline" action="/objectifs/envoi_obj.php">
					<br/>
					<p><label for="name_obj"/>Votre objectif</label><br/>
					<input type="text" id="name_obj" name="name_obj" class=autofocus required/>
					<br/><br/>
					<label for="nb_steps">Nombre d'étapes (Entre 1 et 15)</label><br/>
					<input type="number" id="nb_steps" name="nb_steps" min="0" max="15" value="1" step="1" onkeypress="return false;" />
					<br/><br/>
		       		<input type="submit" value="C'est parti!" class="btn btn-primary"/></p>
       			</form>
			</div>
		</section>
	<?php include("../menus/footer.php"); ?>
	</div>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="../Ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>