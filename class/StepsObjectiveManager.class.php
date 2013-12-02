<?php 

class StepsObjectiveManager
{
	private $_bdd;
	
	public function __construct($bdd) {
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd) {
		$this->_bdd = $bdd;
	}

	public function add($nb_steps) {
		$get_steps_content = $this->getStepsContent();
		for ($i=0; $i < $nb_steps; $i++) {
		    $request = $this->_bdd->prepare('INSERT INTO steps_objective(id_objective, steps_content, date_creation) VALUES(:id_objective, :steps_content, NOW())');
		    $request->execute(array(
		        'id_objective' => $this->getIdObjective(),
		        'steps_content' => $get_steps_content[$i],
		        ));
		    $request->closeCursor();
	    }
	}

	public function read() {
			$request = $this->_bdd->prepare('SELECT * FROM steps_objective');
			$request->execute(array());
			$steps_objective = $request->fetchAll();
			$request->closeCursor();
		return $steps_objective;
	}

}
?>