<?php 

class FriendManager
{
	private $_bdd;
	
	public function __construct($bdd) {
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd) {
		$this->_bdd = $bdd;
	}

	public function add() {
		$request = $this->_bdd->prepare('INSERT INTO friends(id_friends_1, id_friends_2, accepted, date_friends) VALUES (:id_friends_1, :id_friends_2, 0, NOW())');
		$request->execute(array(
	    	'id_friends_1' => $this->getIdFriend1(),
	    	'id_friends_2' => $this->getIdFriend2()));
		$request->closeCursor();
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2 OR(id_friends_2 = :id_friends_1 AND id_friends_1 = :id_friends_2)');
		$request->execute(array(
			'id_friends_1' => $this->getIdFriend1(),
	    	'id_friends_2' => $this->getIdFriend2()));
		$request->closeCursor();
	}

	public function checkAlreadyFriend() {
		$request = $this->_bdd->prepare('SELECT id_friends_1, id_friends_2 FROM friends WHERE id_friends_1 = :id_friends_1 AND id_friends_2 = :id_friends_2 OR (id_friends_1 = :id_friends_2 AND id_friends_2 = :id_friends_1)');
		$request->execute(array(
			'id_friends_1' => $this->getIdFriend1(),
			'id_friends_2' => $this->getIdFriend2()));
		$count = $request->rowCount(); 
		$request->closeCursor();
		return $count;
	}
}
?>