<?php 

class Friend extends FriendManager
{

	private $_id;
	private $_idFriend1;
	private $_idFriend2;
	private $_accepted;
	private $_dateFriend;
	
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
  	public function getIdFriend1(){ return $this->_idFriend1; }
  	public function getIdFriend2(){ return $this->_idFriend2; }
  	public function getAccepted(){ return $this->_accepted; }
  	public function getDateFriend(){ return $this->_dateFriend; }

  	//SET
  	public function setId($id) {
  		$id = (int)($id);
  		if ($id < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_id = $id;
  	}

  	public function setIdFriend1($id_friend_1) {
  		$id_friend_1 = (int)($id_friend_1);
  		if ($id_friend_1 < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idFriend1 = $id_friend_1;
  	}

  	public function setIdFriend2($id_friend_2) {
  		$id_friend_2 = (int)($id_friend_2);
  		if ($id_friend_2 < 0) {
  			trigger_error('ID non valide');
  		}
  		$this->_idFriend2 = $id_friend_2;
  	}

	public function setAccepted($accepted){
		$accepted = (int)($accepted);
		if ($accepted == 0 OR $accepted == 1) {
			$this->_accepted = $accepted;
		} else {
		trigger_error("Valeur non valide");
		}
	}

	public function setDateFriend($date_friend){
		if(!preg_match('#^\d{4}-\d{1,2}-\d{1,2}$#',$date_friend)){
			trigger_error("Date non valide");
		}else {
			$this->_dateFriend = $date_friend;
		}
	}

}

?>