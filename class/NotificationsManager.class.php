<?php 

class NotificationsManager
{
	public function add() {
		$request = $this->_bdd->prepare('INSERT INTO notifications(id_objective, date_creation) VALUES(:id_objective, NOW())');
		$request->execute(array(
			'id_objective' => $this->getIdObjective(),
			));
		$request->closeCursor();
	    $request = $this->_bdd->prepare('SELECT id FROM notifications WHERE id = LAST_INSERT_ID()');
	    $request->execute(array());
	    $id_notification = $request->fetch();
	    $request->closeCursor();

	    //return id_objective for step table
	    return $id_notification['id'];
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM notifications WHERE id_objective = :id_objective');
		$request->execute(array(
			'id_objective' => $this->getIdObjective(),
			));
		$request->closeCursor();
	}

}
?>