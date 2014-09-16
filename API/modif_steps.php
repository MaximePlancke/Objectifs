<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_member 	= isset($_POST['id_member']) ? $_POST['id_member'] : null;
$id_step 	= isset($_POST['id']) ? $_POST['id'] : null;
$done 		= isset($_POST['done']) ? $_POST['done'] : null;

$steps_objective = new StepsObjective($bdd);
$steps_objective->setId($id_step);


if (isset($done)) {
	if ($id_member != $_SESSION['id']) {
		echo "Vous n'avez pas les droits pour cette action";
	}else{
		$steps_objective->updateStatus($done);
		echo "Votre objectif a été déplacé dans la section objectifs terminés";
	}
}

?>
