<?php 

class MemberLikeAdviceManager
{
	public function add() {
	$request = $this->_bdd->prepare('INSERT INTO member_like_advice(id_member, id_advice) VALUES(:id_member, :id_advice)');
	$request->execute(array(
		'id_member' => $this->getIdMember(),
		'id_advice' => $this->getIdAdvice()
		));
	$request->closeCursor();
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM member_like_advice WHERE id_member = :id_member AND id_advice = :id_advice');
		$request->execute(array(
			'id_member' => $this->getIdMember(),
			'id_advice' => $this->getIdAdvice()
		));
		$request->closeCursor();
	}
}
?>