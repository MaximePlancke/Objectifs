<?php 
require 'bbd_connexion.php'; 

var_dump($_SESSION['id']);
$request = $bdd->prepare('INSERT INTO friends(id_friends_1, id_friends_2) VALUES :id_friends1, :id_friends2');
$request->execute(array(
	'id_friends1' => 4,
	'id_friends2' => 3
	));
$request->closeCursor();
// header('Location:current_obj.php');
 ?>