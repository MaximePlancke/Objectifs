<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name 		= isset($_POST['name_utilisateur']) ? $_POST['name_utilisateur'] : null;
	$password 	= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 	= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 		= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;

	if ($name && $password && $password2 && $email){
		//check same name
		$request = $bdd->prepare('SELECT id, pseudo, email FROM membres WHERE pseudo = :pseudo OR email = :email');
		$request->execute(array(
	    	'pseudo' => $name,
			'email' => $email));
		$count = $request->rowCount();
		$request->closeCursor();

		if($count >= 1){
			array_push($errors, 'Le pseudo ou l\'email est déjà utilisé');
		}else{
			if ($password == $password2) {
				$user = new User();
				$user->setPseudo($name);
				$user->setPassword($password);
				$user->setEmail($email);

				$manager = new UserManager($bdd);
				$manager->add($user);
		    	header('Location:/account/login');
		    	exit();
			} else {
				array_push($errors, 'Les mots de passe doivent etre identiques');
			}
		}
	}
}
?>
