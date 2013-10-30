<?php 

require '../connexion/bbd_connexion.php'; 

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name 		= isset($_POST['name_utilisateur']) ? $_POST['name_utilisateur'] : null;
	$password 	= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 	= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 		= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;

	if ($name && $password && $password2 && $email){
		if ($password == $password2) {
			$password_hache = sha1($password);
		 
			$request = $bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, NOW())');
			$request->execute(array(
			    'pseudo' => $name,
			    'password' => $password_hache,
			    'email' => $email));
	        $request->closeCursor();
	        header('Location:../connexion/connexion.php');
		} else {
			array_push($errors, 'Les mots de passe doivent etre identiques');
		}
	}
}
?>

<!DOCTYPE html>
<html>
  	<head>
    <meta charset="UTF-8">
    <title>Motivation</title>
    <!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Ressources/style.css">
    <!-- Intégration du CSS Bootstrap, Font-Awesome et Polices-->
	<link href="../Ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="../Ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../Ressources/font-awesome/css/font-awesome.min.css">
	</head>
 	<body>
		<div id="container-fluid">
			<?php include("../menus/menu_top.php"); ?>
			<section id="main_page" class="row-fluid">
				<?php include("../menus/menu_left.php"); ?>
				<div id="page_right">	
					<h4>Inscription</h4>
					<form method="post" class="well form-inline" action="inscription.php">
						<ul>
							<?php foreach ($errors as $value): ?>
								<li>
									<?php echo $value; ?>
								</li>
							<?php endforeach ?>
						</ul>
						<br/>
						<p><label for="name_utilisateur"/>Nom utilisateur</label><br/>
						<input type="text" id="name_utilisateur" name="name_utilisateur" class=autofocus/>
						<br/><br/>
						<label for="password_utilisateur">Mot de passe</label><br/>
						<input type="password" id="password_utilisateur" name="password_utilisateur" class=autofocus required/>
			       		<br/><br/>
						<label for="password_utilisateur2">Mot de passe (Vérification)</label><br/>
						<input type="password" id="password_utilisateur2" name="password_utilisateur2" class=autofocus required/>
			       		<br/><br/>
						<label for="email_utilisateur">Adresse Email</label><br/>
						<input type="text" id="email_utilisateur" name="email_utilisateur" class=autofocus required/>
			       		<br/><br/>
						<input type="submit" value="Inscription" class="btn btn-primary"/></p>
	       			</form>
				</div>
			</section>
			<?php include("../menus/footer.php"); ?>
		</div>
	<!-- Intégration de la libraire de composants du Bootstrap -->
	<script src="../Ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>