<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name 		= isset($_POST['name_utilisateur']) ? $_POST['name_utilisateur'] : null;
	$password 	= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 	= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 		= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;

	$user = new User();
	$user->setPseudo($name);
	$user->setPassword($password);
	$user->setEmail($email);
	$user->setDb($bdd);

	if ($name && $password && $password2 && $email){
		$check_unique = $user->checkUniqueRegistration();
		if ($check_unique) {
			array_push($errors, $check_unique);
		} else {
			if ($password == $password2) {
				$user->add();
		    	header('Location:/account/login');
		    	exit();
			} else {
				array_push($errors, 'Les mots de passe doivent etre identiques');
			}
		}
	}
}
?>
