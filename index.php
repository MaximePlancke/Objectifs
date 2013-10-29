<?php require 'bbd_connexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Motivation</title>
	<!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Intégration du CSS Bootstrap, Font-Awesome et Polices-->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include("menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
	<?php include("menu_left.php"); ?>
		<div id="page_right">
			<?php
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
	    			echo "<h1>Hey ".htmlspecialchars($_SESSION['pseudo'])."</h1><br/>";
				}
			?>
			<h1>Bienvenue sur ObjectiveShare.com</h1>
			<h4>ObjectiveShare.com est un site de partage d'objectifs. Ainsi grâce à votre volonté et à un réseau de personnes motivé, aidez et faites vous aider pour réaliser vos rêves</h4>
			<img src="images/bubble.png">
			<li>
				<h4>Finir ce site internet</h4>
			</li>
			<ul>
				<li>Commencer la maquette</li>
				<li>Finaliser la maquette</li>
				<li>Creer la base de données</li>
				<li>Développer le PHP</li>
				<li>Développer le Javascript</li>
				<li>Développer le JQuery</li>
				<li>Charte Graphique</li>
				<li>Mettre en ligne</li>
			</ul>
			<h3>Pourquoi cela fonctionnera ?</h3>
			<ul>
				<li>Les gens ont besoin de motivation</li>
				<li>Regrouper les gens ayant les même objectifs</li>
				<li>Facilite l'intégration sociale</li>
				<li>Le site doit être ludique</li>
			</ul>
		</div>
	</section>
	<?php include("footer.php"); ?>
	</div>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>