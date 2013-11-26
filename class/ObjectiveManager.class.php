<?php 

class ObjectiveManager
{
	private $_bdd;
	
	public function __construct($bdd) {
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd) {
		$this->_bdd = $bdd;
	}

	public function add() {
	    $request = $this->_bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :nb_steps, NOW())');
	    $request->execute(array(
	        'id_mem' => $this->getIdMember(),
	        'name_obj' => $this->getNameObjective(),
	        'nb_steps' => $this->getNbSteps(),
	        ));
	    $request->closeCursor();
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM objectifs WHERE id = ?');
		$request->execute(array($this->getId()));
		$request->closeCursor();
	}

	public function read($done) {
		$request = $this->_bdd->prepare('SELECT id, id_membres, name_obj, nb_steps FROM objectifs WHERE id_membres = :id_membres AND done = :done ORDER BY id DESC');
		$request->execute(array(
			'id_membres' => $this->getIdMember(),
			'done' => $done,
			));
		$objectives = $request->fetchAll();
		$request->closeCursor();
		return $objectives;
	}

	public function readOne() {
		$request = $this->_bdd->prepare('SELECT name_obj FROM objectifs WHERE id = ?');
		$request->execute(array($this->getId()));
		$objective_name = $request->fetchAll();
		$request->closeCursor();
		return $objective_name;
	}

	public function updateStatus($done) {
		$request = $this->_bdd->prepare('UPDATE objectifs SET done = :done WHERE id = :id_membres');
		$request->execute(array(
			'id_membres' => $this->getId(),
			'done' => $done,
			));
		$request->closeCursor();
	}
}
?>