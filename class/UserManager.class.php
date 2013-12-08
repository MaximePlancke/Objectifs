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
		$request = $this->_bdd->prepare('INSERT INTO membres(firstname, lastname, password, email, date_inscription) VALUES(:firstname, :lastname, :password, :email, NOW())');
		$request->execute(array(
			'firstname' => $this->getFirstname(),
			'lastname' => $this->getLastname(),
			'password' => sha1($this->getPassword()),
			'email' => $this->getEmail()));
	    $request->closeCursor();
	}

	public function delete() {
		$request = $this->_bdd->query('DELETE FROM membres WHERE id ='.$this->getId());
    	$request->closeCursor();
	}

	public function readLogIn() {
		$request = $this->_bdd->prepare('SELECT id FROM membres WHERE email = :email AND password = :password');
		$request->execute(array(
	    	'email' => $this->getEmail(),
	    	'password' => $this->getPassword()));
		$donnees = $request->fetch();
		return $donnees;
	}

	public function read() {
		$request = $this->_bdd->prepare('SELECT * FROM membres WHERE id = :id');
		$request->execute(array(
	    	'id' => $this->getId()));
		$donnees = $request->fetch();
		return $donnees;
	}

	public function update() {
		
	}

	public function checkUniqueRegistration() {
		$errors = NULL;
		$request = $this->_bdd->prepare('SELECT id, email FROM membres WHERE email = :email');
		$request->execute(array(
			'email' => $this->getEmail()));
		$check_unique = $request->fetchAll();
		$count = $request->rowCount();
		$request->closeCursor();
		if($count >= 1){
			foreach ($check_unique as $value) {
				if ($value['email'] == $this->getEmail()) {
					$errors = $errors . 'L\'email est déjà utilisé </br>';
				}
			}
			return $errors;
		}
	}

	public function listFriends() {
		$request = $this->_bdd->prepare
			('SELECT f.id, m.id, f.id_friends_1, f.id_friends_2, f.accepted, m.firstname, m.lastname, m.id 
			FROM friends AS f, membres AS m 
			WHERE f.id_friends_2 = m.id 
			AND f.accepted = 1
			AND f.id_friends_1 = :user_id
			OR (f.id_friends_1 = m.id 
			AND f.id_friends_2 = :user_id 
			AND f.accepted = 1)
			ORDER BY f.id DESC');
		$request->execute(array(
			'user_id' => $this->getId(),
			));
	    $donnees = $request->fetchAll();
		$request->closeCursor();
		return $donnees;
	}

	public function listRequestFriends() {
		$request = $this->_bdd->prepare
			('SELECT f.id, m.id, f.id_friends_1, f.id_friends_2, f.accepted, m.firstname, m.lastname, m.id 
			FROM friends AS f, membres AS m 
			WHERE f.id_friends_1 = m.id 
			AND f.accepted = 0
			AND f.id_friends_2 = :user_id
			ORDER BY f.id DESC');
		$request->execute(array(
			'user_id' => $this->getId(),
			));
	    $donnees = $request->fetchAll();
		$request->closeCursor();
		return $donnees;
	}

	public function listRequestAdvices() {
		$request = $this->_bdd->prepare('SELECT a.*, m.firstname, m.lastname, o.name_obj FROM advices AS a, objectifs AS o, membres AS m
			WHERE m.id = a.id_member_give_advice AND o.id_membres = :id_member AND o.id = a.id_objective AND a.accepted = 0');
		$request->execute(array(
			'id_member' => $this->getId(),
			));
		$advices = $request->fetchAll();
		$request->closeCursor();
		return $advices;
	}

	public function alertNewAdviceRequest() {
		$request = $this->_bdd->prepare('SELECT COUNT(*) FROM advices AS a , objectifs AS o , membres AS m WHERE m.id = a.id_member_give_advice AND o.id_membres = :id_member AND o.id = a.id_objective AND a.accepted = 0');
		$request->execute(array(
			'id_member' => $this->getId(),
			));
		$count = $request->fetch();
		$count = $count[0];
		return $count;
	}

	public function listUsers() {
		$request = $this->_bdd->prepare('SELECT * FROM membres ORDER BY firstname');
		$request->execute(array());
		$donnees = $request->fetchAll();
		return $donnees;
	}

}
?>