<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<title>Motivation</title>
	<?php //Open the window to the screen size?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="ressources/style.css">
	<?php //Integration CSS Bootstrap, Font-Awesome and Polices ?>
	<link href="ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
  <body>
	<div id="container-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>
		<div id="page_right">
			<?php
				if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
	    			echo "<h1>Hey ".htmlspecialchars($_SESSION['pseudo'])."</h1><br/>";
				}
			?>
			<h1>Bienvenue sur ObjectiveShare.com</h1>
			<h4>ObjectiveShare.com est un site de partage d'objectifs. Ainsi grâce à votre volonté et à un réseau de personnes motivé, aidez et faites vous aider pour réaliser vos rêves</h4>
			<img src="/ressources/images/bubble.png">
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
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>
	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>