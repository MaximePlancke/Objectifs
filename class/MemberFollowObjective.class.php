<?php 

class MemberFollowObjective extends MemberFollowObjectiveManager
{
  protected $_bdd;
	private $_id;
	private $_idMember;
	private $_idObjective;

	function __construct(PDO $bdd, array $datas = array())
	{
    $this->_bdd = $bdd;
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
  	public function getIdObjective(){ return $this->_idObjective; }

  	//SET
  	public function setId($id) {
  		$id = (int)($id);
  		if ($id < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idMember = $id;
  	}

   	public function setIdMember($id_member) {
  		$id_member = (int)($id_member);
  		if ($id_member < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idMember = $id_member;
  	}

  	public function setIdObjective($id_objective) {
  		$id_objective = (int)($id_objective);
  		if ($id_objective < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idObjective = $id_objective;
  	}

}

?>