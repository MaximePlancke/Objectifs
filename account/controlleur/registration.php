<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name 		= isset($_POST['name_utilisateur']) ? $_POST['name_utilisateur'] : null;
	$password 	= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 	= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 		= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;

	if ($name && $password && $password2 && $email){
<<<<<<< HEAD
		if ($password == $password2) {
			$password_hache = sha1($password);
		 
			$request = $bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, NOW())');
			$request->execute(array(
			    'pseudo' => $name,
			    'password' => $password_hache,
			    'email' => $email));
	        $request->closeCursor();
	        header('Location:/account/login'); 
	        exit();
		} else {
			array_push($errors, 'Les mots de passe doivent être identiques');
=======
		//check same name
		$request = $bdd->prepare('SELECT id, pseudo FROM membres WHERE pseudo = :pseudo');
		$request->execute(array(
	    	'pseudo' => $name));
		$count_pseudo = $request->rowCount();
		$request->closeCursor();
		//check same email
		$request = $bdd->prepare('SELECT id, email FROM membres WHERE email = :email');
		$request->execute(array(
	    	'email' => $email));
		$count_email = $request->rowCount();
		$request->closeCursor();

		if($count_pseudo >= 1){
			array_push($errors, 'Le pseudo est déjà utilisé');
		}elseif ($count_email >= 1) {
			array_push($errors, 'L\'email est déjà utilisé');
		}else{
			if ($password == $password2) {
				$user = new User(array());
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
>>>>>>> opti/css-structure-du-site
		}
	}
}
?>
