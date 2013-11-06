<?php

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
	        header('Location:?page=log_in');
	        exit();
		} else {
			array_push($errors, 'Les mots de passe doivent etre identiques');
		}
	}
}
?>
