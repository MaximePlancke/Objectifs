<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_member = isset($_POST['id_member']) ? $_POST['id_member'] : null;
$id_advice = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;
$id_member_give_advice = isset($_POST['id_member_give_advice']) ? $_POST['id_member_give_advice'] : null;
$delete_advice = isset($_POST['delete_advice']) ? $_POST['delete_advice'] : null;

if($id_advice AND $delete_advice) {
	if ($id_member == $_SESSION['id'] OR $id_member_give_advice == $_SESSION['id']) {
		$advices_objective = new Advice();
		$advices_objective->setDb($bdd);
		$advices_objective->setId($id_advice);
		$advices_objective->delete();
		echo("le conseil a été supprimé");
	} else {
		echo("Vous n'avez pas les droits pour cette action");
	}
}

?>