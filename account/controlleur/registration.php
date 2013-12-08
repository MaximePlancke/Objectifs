<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$firstname 		= isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname 		= isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$password 	= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 	= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 		= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;

	$user = new User();
	$user->setFirstname($firstname);
	$user->setLastname($lastname);
	$user->setPassword($password);
	$user->setEmail($email);
	$user->setDb($bdd);

	if ($firstname && $lastname && $password && $password2 && $email){
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
