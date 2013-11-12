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
}
?>