<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_member = isset($_POST['id_member']) ? $_POST['id_member'] : null;
$id_advice = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;
$id_member_give_advice = isset($_POST['id_member_give_advice']) ? $_POST['id_member_give_advice'] : null;
$target_event = isset($_POST['target_event']) ? $_POST['target_event'] : null;

if($id_advice AND $target_event == 'delete_advice') {
	if ($id_member == $_SESSION['id'] OR $id_member_give_advice == $_SESSION['id']) {
		$advices_objective = new Advice();
		$advices_objective->setDb($bdd);
		$advices_objective->setId($id_advice);
		$advices_objective->delete();
		echo("Conseil supprimé");
	} else {
		echo("Vous n'avez pas les droits pour cette action");
	}
}

if($id_advice AND $target_event == 'accept_advice') {
	$advices_objective = new Advice();
	$advices_objective->setDb($bdd);
	$advices_objective->setId($id_advice);
	$advices_objective->confirm_add();
	echo("Conseil accepté");
}

?>