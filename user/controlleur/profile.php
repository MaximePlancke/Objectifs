<?php 

$id_member = $_GET["id"];

$user = new User();
$user->setDb($bdd);
$user->setId($id_member);

?>