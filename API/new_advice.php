<?php
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

	if (isset($_POST['new_advice'])) {
		$advice_content = isset($_POST['new_advice']) ? $_POST['new_advice'] : null;
		$id_member_give_advice = isset($_SESSION['id']) ? $_SESSION['id'] : null;

		$add_advice = new Advice($bdd);
		$add_advice->setIdMemberGiveAdvice($id_member_give_advice);
		$add_advice->setAdviceContent($advice_content);
		$add_advice->setIdObjective($id_objective);

		if ($id_member_give_advice AND $id_objective AND $advice_content) {
			$add_advice->add();
			echo "Votre conseil sera visible une fois accepté par la personne ayant crée l'objectif";
		} else {
			echo "Vous n'êtes pas connecté, Veuillez vous connecter";
		}
	}
?>