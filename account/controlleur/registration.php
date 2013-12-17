<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$firstname 		= isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname 		= isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$password 		= isset($_POST['password_utilisateur']) ? $_POST['password_utilisateur'] : null;
	$password2 		= isset($_POST['password_utilisateur2']) ? $_POST['password_utilisateur2'] : null;
	$email 			= isset($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;
	$file 			= isset($_FILES['avatar_utilisateur']) ? $_FILES['avatar_utilisateur'] : null;
	$uploadDir 		= 0;
	$resultat		= NULL;
	$max_size		= 2097152;
	$regex 			= '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

	if (isset($file)) {
		if (is_uploaded_file($file['tmp_name'])) {
			if ($file['size'] < $max_size){
				$typesOk = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
				$elem = explode(".", $file['name']);
	            $nb = count($elem);
	            $nom = md5(uniqid(rand(), true));
	            if(in_array($elem[$nb-1], $typesOk)){
					// $image_sizes = getimagesize($file['tmp_name']);
					// if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
					$uploadDir = '/uploads/images/'.basename($nom);
					$chemin_destination = $_SERVER['DOCUMENT_ROOT'].$uploadDir;
					$resultat = move_uploaded_file($file['tmp_name'],$chemin_destination);
				} else {
					array_push($errors, 'Mauvais type de fichier');
				}
			} else {
				array_push($errors, 'Image trop volumineuse');
			}
		} else {
			array_push($errors, 'Veuillez choisir une image pour votre profil');
		}
	} else {
		array_push($errors, 'Veuillez choisir une image pour votre profil');
	}

	$user = new User($bdd);
	$user->setFirstname($firstname);
	$user->setLastname($lastname);
	$user->setPassword($password);
	$user->setEmail($email);
	$user->setAvatar($uploadDir);

	if ($firstname && $lastname && $password && $password2 && $email && $resultat){
		$check_unique = $user->checkUniqueRegistration();
		if (!$check_unique) {
	   		if(preg_match($regex,$email)) {  
				if ($password == $password2) {
					$user->add();
			    	header('Location:/account/login');
			    	exit();
				} else {
					array_push($errors, 'Les mots de passe doivent etre identiques');
				}
	   		} else {
	   			array_push($errors, 'L\'adresse email n\'est pas valide');
			}
		} else {
			array_push($errors, $check_unique);
		}
	}
}
?>
