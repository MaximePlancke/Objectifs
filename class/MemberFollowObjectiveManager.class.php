<?php 

class MemberFollowObjectiveManager
{
	public function add() {
	$request = $this->_bdd->prepare('SELECT COUNT(*) FROM member_follow_objective WHERE id_member = :id_member AND id_objective = :id_objective');
	$request->execute(array(
		'id_member' => $this->getIdMember(),
		'id_objective' => $this->getIdObjective()
		));
		$count = $request->fetch();
		$count = $count[0];
		$request->closeCursor(); 
		if ($count == 0) {
			$request = $this->_bdd->prepare('INSERT INTO member_follow_objective(id_member, id_objective) VALUES(:id_member, :id_objective)');
			$request->execute(array(
				'id_member' => $this->getIdMember(),
				'id_objective' => $this->getIdObjective()
				));
			$request->closeCursor();
		}
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM member_follow_objective WHERE id_member = :id_member AND id_objective = :id_objective');
		$request->execute(array(
			'id_member' => $this->getIdMember(),
			'id_objective' => $this->getIdObjective()
		));
		$request->closeCursor();
	}
}
?>