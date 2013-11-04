<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$pseudo = $_POST['name_utilisateur'];
	$password_hache = sha1($_POST['password_utilisateur']);

	$request = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND password = :password');
	$request->execute(array(
	    'pseudo' => $pseudo,
	    'password' => $password_hache)
	);
	$user = $request->fetch();
	$request->closeCursor();

	if (!$user) {
	    array_push($errors, 'Mauvais identifiant ou mot de passe !');
	} else {
	    $_SESSION['id'] = $user['id'];
	    $_SESSION['pseudo'] = $pseudo;
		header('Location:/index.php');
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
				<h4>Connection</h4>
				<form method="post" class="well form-inline" action="/account/log_in.php">
					<?php if(count($errors) > 0): ?>
					<ul>
						<?php foreach ($errors as $value): ?>
							<li><?php echo $value; ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					
					<br/>
					<p><label for="name_utilisateur"/>Nom utilisateur</label><br/>
					<input type="text" id="name_utilisateur" name="name_utilisateur" class=autofocus required/>
					<br/><br/>
					<label for="password_utilisateur">Mot de passe</label><br/>
					<input type="password" id="password_utilisateur" name="password_utilisateur" class=autofocus required/>
		       		<br/><br/>
		       		<input type="submit" value="Connection" class="btn btn-primary"/></p>
		       		<h6><a href="">Mot de passe oublié?</a></h6>
	   			</form>
	   			<h4><a href="">Nouvelle inscription</a></h4>
			</div>
		</section>
		<?php include($_SERVER['DOCUMENT_ROOT']."menus/footer.php"); ?>
	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>