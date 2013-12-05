<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_step = isset($_POST['id']) ? $_POST['id'] : null;
$done = isset($_POST['done']) ? $_POST['done'] : null;

$steps_objective = new StepsObjective();
$steps_objective->setDb($bdd);
$steps_objective->setId($id_step);
$steps_objective->updateStatus($done);

if (isset($done)) {
	if ($id_member != $_SESSION['id']) {
		array_push($errors, "Vous n'avez pas les droits pour cette action");
	}else{
		$objective->updateStatus(1);
		array_push($success, "Votre objectif a été déplacé dans la section objectifs terminés");
	}
}

?>
