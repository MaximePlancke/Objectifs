<?php 
$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$user = new User();
$user->setDb($bdd);
$user->setId($user_id);

$list_advices_request = $user->listRequestAdvices();
?>