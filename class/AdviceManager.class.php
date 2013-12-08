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

	public function confirm_add() {
		$request = $this->_bdd->prepare('UPDATE advices SET accepted = 1 WHERE id = :id');
		$request->execute(array(
	    	'id' => $this->getId(),
	    	));
		$request->closeCursor();
	}

	public function read() {
		$request = $this->_bdd->prepare('SELECT a.*, m.firstname, m.lastname  FROM advices AS a INNER JOIN membres AS m 
			ON m.id = a.id_member_give_advice WHERE a.accepted = 1 ORDER BY id DESC');
		$request->execute(array());
		$advices_objective = $request->fetchAll();
		$request->closeCursor();
		return $advices_objective;
	}

	public function read5Last() {
		$request = $this->_bdd->prepare('SELECT a.* , o.name_obj FROM advices AS a INNER JOIN objectifs AS o 
			ON o.id = a.id_objective WHERE a.accepted = 1 ORDER BY a.id DESC LIMIT 5');
		$request->execute(array());
		$advices = $request->fetchAll();
		$request->closeCursor();
		return $advices;
	}


	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM advices WHERE id = ?');
		$request->execute(array($this->getId()));
		$request->closeCursor();
	}

}
?>