<?php 

/**
* Create clas User
*/
class User
{

	private $_id;
	private $_pseudo;
	private $_password;
	private $_email;
	private $_dateInscription;
	
	public function __construct($id, $pseudo)
	{	
		$this->setId($id);
		$this->setPseudo($pseudo);
	}

	//GET
	public function id(){ return $this->_id; }
	public function pseudo(){ return $this->_pseudo; }
	public function password(){ return $this->_password; }
	public function email(){ return $this->_email; }
	public function dateInscription(){ return $this->_dateInscription; }

	//SET
	public function setId($id){

		if (!is_int($id) OR $id < 0) {
			trigger_error("ID non valide");
		}
		$this->_id = $id;
	}

	public function setPseudo($pseudo){

		if (!is_string($pseudo)) {
			trigger_error("Pseudo non valide");
		}	
		$this->_pseudo = $pseudo;
	}

	public function setPassword($password){

		$this->_password = $password;
	}

	public function setEmail($email){

		$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
	   	if(!preg_match($Syntaxe,$email)) {  
	    	trigger_error("Email non valide"); 
	    }else  
		$this->_email = $email;
	}

	public function setDateInscription($dateInscription){

		if(!preg_match('#^\d{4}-\d{1,2}-\d{1,2}$#',$dateInscription))
		{
			trigger_error("Date d'inscription non valide");
		}else
			$this->_dateInscription = $dateInscription;
	}
}

?>