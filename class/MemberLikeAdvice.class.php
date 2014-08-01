<?php 

class MemberLikeAdvice extends MemberLikeAdviceManager
{
  protected $_bdd;
	private $_id;
	private $_idMember;
	private $_idAdvice;

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
  	public function getIdAdvice(){ return $this->_idAdvice; }

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

  	public function setIdAdvice($id_advice) {
  		$id_advice = (int)($id_advice);
  		if ($id_advice < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idAdvice = $id_advice;
  	}

}

?>