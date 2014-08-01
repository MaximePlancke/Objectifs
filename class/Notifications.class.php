<?php 

class Notifications extends NotificationsManager
{
  protected $_bdd;
	private $_id;
  private $_id_objective;
	private $_type;
	private $_dateCreation;
	
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
    public function getIdObjective(){ return $this->_id_objective; }
  	public function getType(){ return $this->_type; }
  	public function getDateCreation(){ return $this->_dateCreation; }

  	//SET
  	public function setId($id) {
  		$id = (int)($id);
  		if ($id < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_id = $id;
  	}

    //SET
    public function setIdObjective($id_objective) {
      $id_objective = (int)($id_objective);
      if ($id_objective < 0) {
        trigger_error('ID non valide');
      }
      $this->_id_objective = $id_objective;
    }

    public function setType($type) {
      $type = (int)($type);
      if ($type < 0) {
        trigger_error('type non valide');
      }
      $this->_type = $type;
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