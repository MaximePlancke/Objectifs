<?php 

class AdviceManager
{
	
	function __construct($bdd)
	{
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd) {
		$this->_bdd = $bdd;
	}

	public function add() {
		$request = $this->_bdd->prepare('INSERT INTO advices(id_member_give_advice, id_objective, advice_content, date_creation) VALUES(:id_member_give_advice, :id_objective, :advice_content, NOW())');
		$request->execute(array(
			'id_member_give_advice' => $this->getIdMemberGiveAdvice(),
			'id_objective' => $this->getIdObjective(),
			'advice_content' => $this->getAdviceContent()
			));
		$request->closeCursor();
	}
}

 ?>