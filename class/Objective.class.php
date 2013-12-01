<?php 

class Objective extends ObjectiveManager
{
	private $_id;
	private $_idMember;
	private $_nameObjective;
	private $_category;
	private $_dateCreation;
	private $_nbSteps;
	private $_done;
	
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
	public function getIdMember(){ return $this->_idMember; }
	public function getNameObjective(){ return $this->_nameObjective; }
	public function getCategory(){ return $this->_category; }
	public function getDateCreation(){ return $this->_dateCreation; }
	public function getNbSteps(){ return $this->_nbSteps; }
	public function getDone(){ return $this->_done; }

	//SET
	public function setId($id){
		$id = (int)($id);
		if ($id < 0) {
			trigger_error("ID non valide");
		}
		$this->_id = $id;
	}

	public function setIdMember($id_member){
		$id_member = (int)($id_member);
		if ($id_member < 0) {
			trigger_error("ID non valide");
		}
		$this->_idMember = $id_member;
	}

	public function setNameObjective($name_objective){
		$this->_nameObjective = $name_objective;
	}

	public function setDateCreation($date_creation){
		if(!preg_match('#^\d{4}-\d{1,2}-\d{1,2}$#',$date_creation)){
			trigger_error("Date de création non valide");
		}else {
			$this->_dateCreation = $date_creation;
		}
	}

	public function setCategory($category) {
		$category = (int)($category);
		if ($category < 0) {
			trigger_error("Catégorie non valide");
		}
		$this->_category = $category;
	}

	public function setNbSteps($nb_steps){
		$nb_steps = (int)($nb_steps);
		if ($nb_steps < 0 OR $nb_steps > 15) {
			trigger_error("Valeur non valide");
		}
		$this->_nbSteps = $nb_steps;
	}

	public function setDone($done){
		$done = (int)($done);
		if ($done == 0 OR $done == 1) {
			$this->_done = $done;
		} else {
		trigger_error("Valeur non valide");
		}
	}
}
?>