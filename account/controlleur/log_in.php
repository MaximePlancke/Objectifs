<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = $_POST['name_utilisateur'];
	$password_hache = sha1($_POST['password_utilisateur']);

	$request = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND password = :password');
	$request->execute(array(
	    'pseudo' => $name,
	    'password' => $password_hache)
	);
	$user = $request->fetch();
	$request->closeCursor();

	if (!$user) {
	    array_push($errors, 'Mauvais identifiant ou mot de passe !');
	} else {
	    $_SESSION['id'] = $user['id'];
	    $_SESSION['pseudo'] = $name;
		header('Location: /');
		exit();
	}
}
?>