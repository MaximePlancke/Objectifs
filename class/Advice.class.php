<?php 

class Advice extends AdviceManager
{
	private $_id;
	private $_idMemberGiveAdvice;
	private $_idObjective;
	private $_adviceContent;
	private $_dateCreation;
	
	function __construct(array $datas = array())
	{
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
  	public function getIdMemberGiveAdvice(){ return $this->_idMemberGiveAdvice; }
  	public function getIdObjective(){ return $this->_idObjective; }
  	public function getAdviceContent(){ return $this->_adviceContent; }
  	public function getDateCreation(){ return $this->_dateCreation; }

  	//SET
  	public function setId($id) {
  		$id = (int)($id);
  		if ($id < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_id = $id;
  	}

  	public function setIdMemberGiveAdvice($id_member_give_advice) {
  		$id_member_give_advice = (int)($id_member_give_advice);
  		if ($id_member_give_advice < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idMemberGiveAdvice = $id_member_give_advice;
  	}

  	public function setIdObjective($id_objective) {
  		$id_objective = (int)($id_objective);
  		if ($id_objective < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idObjective = $id_objective;
  	}

  	public function setAdviceContent($advice_content) {
  		$this->_adviceContent = $advice_content;
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