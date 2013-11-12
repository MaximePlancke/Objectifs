<?php 

class User
{

	private $_id;
	private $_pseudo;
	private $_password;
	private $_email;
	private $_dateInscription;
	
	public function __construct(array $donnees) {	
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees) {
		foreach ($donnees as $key => $value) {
    		$method = 'set'.ucfirst($key);
         	if (method_exists($this, $method)) {
     			$this->$method($value);
    		}
  		}
  	}

	//GET
	public function getId(){ return $this->_id; }
	public function getPseudo(){ return $this->_pseudo; }
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

	public function setPseudo($pseudo){
		$this->_pseudo = $pseudo;
	}

	public function setPassword($password){
		$this->_password = $password;
	}

	public function setEmail($email){

		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
	   	if(!preg_match($Syntaxe,$email)) {  
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