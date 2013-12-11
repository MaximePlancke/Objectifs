<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$email 			= $_POST['email'];
	$password_hache = sha1($_POST['password_user']);

	$user = new User($bdd);
	$user->setEmail($email);
	$user->setPassword($password_hache);
	$user_id = $user->readLogIn();
	if (!$user_id['id']) {
	    array_push($errors, 'Mauvais identifiant ou mot de passe !');
	} else {
	    $_SESSION['id'] = $user_id['id'];
		header('Location: /');
		exit();
	}
}
?>