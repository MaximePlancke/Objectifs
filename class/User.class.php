<?php 

class User extends UserManager
{

	private $_id;
	private $_firstname;
	private $_lastname;
	private $_password;
	private $_email;
	private $_dateInscription;
	
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
	public function getFirstname(){ return $this->_firstname; }
	public function getLastname(){ return $this->_lastname; }
	public function getPassword(){ return $this->_password; }
	public function getEmail(){ return $this->_email; }
	public function getDateInscription(){ return $this->_dateInscription; }

	//SET
	public function setId($id){
		$id = (int)($id);
		if ($id < 0) {
			trigger_error("ID non valide");
		}
		$this->_id = $id;
	}

	public function setFirstname($firstname){
		$this->_firstname = $firstname;
	}

	public function setLastname($lastname){
		$this->_lastname = $lastname;
	}

	public function setPassword($password){
		$this->_password = $password;
	}

	public function setEmail($email){

		$regex = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
	   	if(!preg_match($regex,$email)) {  
	    	trigger_error("Email non valide"); 
	    } else {
	    	$this->_email = $email;
	    } 
	}

	public function setDateInscription($dateInscription){

		if(!preg_match('#^\d{4}-\d{1,2}-\d{1,2}$#',$dateInscription)){
			trigger_error("Date d'inscription non valide");
		}else {
			$this->_dateInscription = $dateInscription;
		}
	}
}
?>