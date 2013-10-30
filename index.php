<?php require 'connexion/bbd_connexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Motivation</title>
	<!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Ressources/style.css">
	<!-- Intégration du CSS Bootstrap, Font-Awesome et Polices-->
	<link href="Ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="Ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include("menus/menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
	<?php include("menus/menu_left.php"); ?>
		<div id="page_right">
			<?php
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
	    			echo "<h1>Hey ".htmlspecialchars($_SESSION['pseudo'])."</h1><br/>";
				}
			?>
			<h1>Bienvenue sur ObjectiveShare.com</h1>
			<h4>ObjectiveShare.com est un site de partage d'objectifs. Ainsi grâce à votre volonté et à un réseau de personnes motivé, aidez et faites vous aider pour réaliser vos rêves</h4>
			<img src="Ressources/images/bubble.png">
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
				<li>BlabBla</li>
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
	<?php include("menus/footer.php"); ?>
	</div>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="Ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>