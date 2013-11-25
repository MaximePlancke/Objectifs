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

	public function add(User $user) {
		$request = $this->_bdd->prepare('INSERT INTO membres(pseudo, password, email, date_inscription) VALUES(:pseudo, :password, :email, NOW())');
		$request->execute(array(
			'pseudo' => $user->getPseudo(),
			'password' => sha1($user->getPassword()),
			'email' => $user->getEmail()));
	    $request->closeCursor();
	}

	public function delete(User $user) {
		$request = $this->_bdd->query('DELETE FROM membres WHERE id ='.$user->getId());
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

	public function update(User $user) {
		
	}

	public function checkUniqueRegistration(User $user) {
		$errors = NULL;
		$request = $this->_bdd->prepare('SELECT id, pseudo, email FROM membres WHERE pseudo = :pseudo OR email = :email');
		$request->execute(array(
	    	'pseudo' => $user->getPseudo(),
			'email' => $user->getEmail()));
		$check_unique = $request->fetchAll();
		$count = $request->rowCount();
		$request->closeCursor();
		if($count >= 1){
			foreach ($check_unique as $value) {
				if ($value['email'] == $user->getEmail()) {
					$errors = $errors . 'L\'email est déjà utilisé </br>';
				}
				if ($value['pseudo'] == $user->getPseudo()) {
					$errors = $errors . 'Le pseudo est déjà utilisé';
				}
			}
			return $errors;
		}
	}

}
?>