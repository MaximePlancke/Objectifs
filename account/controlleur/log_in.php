<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$username = $_POST['username'];
	$password_hache = sha1($_POST['password_user']);

	$user = new User();
	$user->setPseudo($username);
	$user->setPassword($password_hache);
	$user->setDb($bdd);
	$user_id = $user->readLogIn();
	if (!$user_id['id']) {
	    array_push($errors, 'Mauvais identifiant ou mot de passe !');
	} else {
	    $_SESSION['id'] = $user_id['id'];
	    $_SESSION['pseudo'] = $username;
		header('Location: /');
		exit();
	}
}
?>