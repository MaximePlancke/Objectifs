<?php 

class NotificationsMemberManager
{
	public function add($id_notification) {
		$request = $this->_bdd->prepare('SELECT mfo.id_member, n.id FROM member_follow_objective AS mfo, notifications AS n
			WHERE mfo.id_objective = n.id_objective AND n.id = :id_notification');
	    $request->execute(array(
	    	'id_notification' => (int)$id_notification,
	    	));
	    $notifications = $request->fetchAll();
	    $request->closeCursor();
	    foreach ($notifications as $value) {
			$request = $this->_bdd->prepare('INSERT INTO notifications_member(id_member, id_notification) VALUES(:id_member, :id_notification)');
			$request->execute(array(
				'id_member' => $value['id_member'],
				'id_notification' => $value['id']
				));
			$request->closeCursor();
	    }
	}

	public function seen() {
	$request = $this->_bdd->prepare('UPDATE notifications_member SET seen = 1 WHERE id = :id');
	$request->execute(array(
    	'id' => $this->getId(),
	));
	$request->closeCursor();
	}

}
?>