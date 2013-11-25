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
		$check_unique = $request->fetchAll();
		$count = $request->rowCount();
		$request->closeCursor();

		if($count >= 1){
			foreach ($check_unique as $key => $value) {
				if ($value['email'] == $email) {
					array_push($errors, 'L\'email est déjà utilisé');
				}
				if ($value['pseudo'] == $name) {
					array_push($errors, 'Le pseudo est déjà utilisé');
				}
			}
		}else {
			if ($password == $password2) {
				$user = new User();
				$user->setPseudo($name);
				$user->setPassword($password);
				$user->setEmail($email);

				$user->setDb($bdd);
				$user->add($user);
		    	header('Location:/account/login');
		    	exit();
			} else {
				array_push($errors, 'Les mots de passe doivent etre identiques');
			}
		}
	}
}
?>
