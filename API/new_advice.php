<?php
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$add_advice_content 	= isset($_POST['add_advice_content']) ? $_POST['add_advice_content'] : null;
$id_member_give_advice 	= isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_objective			= isset($_POST['id_objective']) ? $_POST['id_objective'] : null;

if ($add_advice_content) {
	$add_advice = new Advice($bdd);
	$add_advice->setIdMemberGiveAdvice($id_member_give_advice);
	$add_advice->setAdviceContent($add_advice_content);
	$add_advice->setIdObjective($id_objective);

	if ($id_member_give_advice AND $id_objective AND $add_advice_content) {
		if ($add_advice_content == 'Ajouter un conseil') {
			echo "Veuillez entrer un conseil";
		} else {
			$add_advice->add();
			echo "Votre conseil sera visible une fois accepté par la personne ayant crée l'objectif";
		}
	} else {
		echo "Vous n'êtes pas connecté, Veuillez vous connecter";
	}
}
?>