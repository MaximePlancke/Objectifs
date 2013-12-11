<?php 
$id_member 	= isset($_GET['id']) ? $_GET['id'] : null;

$user = new User($bdd);
$user->setId($user_id);

$list_advices_request = $user->listRequestAdvices();
?>