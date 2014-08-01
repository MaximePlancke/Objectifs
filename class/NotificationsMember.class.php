<?php 

class NotificationsMember extends NotificationsMemberManager
{
  protected $_bdd;
	private $_id;
	private $_idMember;
	private $_idNotification;
	private $_seen;
	
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
  	public function getIdNotification(){ return $this->_idNotification; }
  	public function getSeen(){ return $this->_seen; }

  	//SET
  	public function setId($id) {
  		$id = (int)($id);
  		if ($id < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_id = $id;
  	}

  	public function setIdMember($id_member) {
  		$id_member = (int)($id_member);
  		if ($id_member < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idFriend1 = $id_member;
  	}

  	public function setIdNotification($id_notification) {
  		$id_notification = (int)($id_notification);
  		if ($id_notification < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idNotification = $id_notification;
  	}

	public function setAccepted($seen){
		$seen = (int)($seen);
		if ($seen == 0 OR $seen == 1) {
			$this->_seen = $seen;
		} else {
		trigger_error("Valeur non valide");
		}
	}

}

?>