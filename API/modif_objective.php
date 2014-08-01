<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_objective 	= isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$target_event 	= isset($_POST['target_event']) ? $_POST['target_event'] : null;

if($id_objective AND $target_event == 'done_objective') {
	$notifications = new Notifications($bdd);
	$notifications->setIdObjective($id_objective);
	$id_notification = $notifications->add();

	$notificationsMember = new NotificationsMember($bdd);
	$notificationsMember->add($id_notification);
}

if($id_objective AND $target_event == 'obj_modif') {
	$notifications = new Notifications($bdd);
	$notifications->setIdObjective($id_objective);
	$notifications->delete();
}

?>