<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_notification 	= isset($_POST['id_notification']) ? $_POST['id_notification'] : null;

if($id_notification) {
	$notificationsMember = new NotificationsMember($bdd);
	$notificationsMember->setId($id_notification);
	$notificationsMember->seen();
}

?>