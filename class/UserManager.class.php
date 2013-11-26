<?php

class UserManager
{
	private $_bdd;

	public function __construct($bdd) {
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd) {
		$this->_bdd = $bdd;
	}

	public function add() {
		$request = $this->_bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, NOW())');
		$request->execute(array(
			'pseudo' => $this->getPseudo(),
			'password' => sha1($this->getPassword()),
			'email' => $this->getEmail()));
	    $request->closeCursor();
	}

	public function delete() {
		$request = $this->_bdd->query('DELETE FROM membres WHERE id ='.$this->getId());
    	$request->closeCursor();
	}

	public function read() {
		$request = $this->_bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND password = :password');
		$request->execute(array(
	    	'pseudo' => $this->getPseudo(),
	    	'password' => $this->getPassword()));
		$donnees = $request->fetch();
		return $donnees['id'];
	}

	public function update() {
		
	}

	public function checkUniqueRegistration() {
		$errors = NULL;
		$request = $this->_bdd->prepare('SELECT id, pseudo, email FROM membres WHERE pseudo = :pseudo OR email = :email');
		$request->execute(array(
	    	'pseudo' => $this->getPseudo(),
			'email' => $this->getEmail()));
		$check_unique = $request->fetchAll();
		$count = $request->rowCount();
		$request->closeCursor();
		if($count >= 1){
			foreach ($check_unique as $value) {
				if ($value['email'] == $this->getEmail()) {
					$errors = $errors . 'L\'email est déjà utilisé </br>';
				}
				if ($value['pseudo'] == $this->getPseudo()) {
					$errors = $errors . 'Le pseudo est déjà utilisé';
				}
			}
			return $errors;
		}
	}

}
?>