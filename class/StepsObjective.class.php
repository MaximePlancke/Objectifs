<?php 

class StepsObjective extends StepsObjectiveManager
{
	private $_id;
	private $_idObjective;
	private $_stepsContent;
	private $_done;
	private $_dateCreation;
	
	public function __construct(array $datas = array()) {
		$this->hydrate($datas);
	}

	public function hydrate(array $datas = array()) {
		foreach ($datas as $key => $value) {
    		$method = 'set'.ucfirst($key);
         	if (method_exists($this, $method)) {
     			$this->$method($value);
    		}
  		}
  	}

	//GET
	public function getId(){ return $this->_id; }
	public function getIdObjective(){ return $this->_idObjective; }
	public function getStepsContent(){ return $this->_stepsContent; }
	public function getDone(){ return $this->_done; }
	public function getDateCreation(){ return $this->_dateCreation; }

	//SET
	public function setId($id){
		$id = (int)($id);
		if ($id < 0) {
			trigger_error("ID non valide");
		}
		$this->_id = $id;
	}

	public function setIdObjective($id_objective){
		$this->_idObjective = $id_objective;
	}

	public function setStepsContent($steps_content){
		$this->_stepsContent = $steps_content;
	}

	public function setDone($done){
		$done = (int)($done);
		if ($done == 0 OR $done == 1) {
			$this->_done = $done;
		} else {
		trigger_error("Valeur non valide");
		}
	}

	public function setDateCreation($date_creation){
		if(!preg_match('#^\d{4}-\d{1,2}-\d{1,2}$#',$date_creation)){
			trigger_error("Date de création non valide");
		}else {
			$this->_dateCreation = $date_creation;
		}
	}

}
?>