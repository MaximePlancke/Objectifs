<?php 

class ObjectiveManager
{

	public function add() {
	    $request = $this->_bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, category, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :category, :nb_steps, NOW())');
	    $request->execute(array(
	        'id_mem' => $this->getIdMember(),
	        'name_obj' => $this->getNameObjective(),
	        'category' => $this->getCategory(),
	        'nb_steps' => $this->getNbSteps(),
	        ));
	    $request->closeCursor();
	    $request = $this->_bdd->prepare('SELECT id FROM objectifs WHERE id = LAST_INSERT_ID()');
	    $request->execute(array());
	    $id_objective_for_steps = $request->fetch();
	    $request->closeCursor();

	    //return id_objective for step table
	    return $id_objective_for_steps['id'];
	}

	public function delete() {
		$request = $this->_bdd->prepare('DELETE FROM objectifs WHERE id = ?');
		$request->execute(array($this->getId()));
		$request->closeCursor();
	}

	public function readAll($user_id, $filter) {
		if ($filter == NULL) {
			$request = $this->_bdd->prepare('SELECT o.*, m.firstname, m.lastname FROM objectifs AS o , membres AS m  WHERE m.id = o.id_membres ORDER BY o.id DESC');
			$request->execute(
				);
			$objectives = $request->fetchAll();
			$request->closeCursor();
			$objectives = $this->categoryName($objectives);
			foreach ($objectives as &$value) {
				$value['already_follow'] = $this->alreadyFollow($value, $user_id);
			}
			return $objectives;
		} else {
			$request = $this->_bdd->prepare('SELECT o.*, m.firstname, m.lastname FROM objectifs AS o , membres AS m  WHERE m.id = o.id_membres AND '.implode(' AND ', $filter['where']).' ORDER BY id DESC');
			$request->execute(
				$filter['argumentPDO']
				);
			$objectives = $request->fetchAll();
			$request->closeCursor();
			$objectives = $this->categoryName($objectives);
			foreach ($objectives as &$value) {
				$value['already_follow'] = $this->alreadyFollow($value, $user_id);
			}
			return $objectives;
		}
	}

	public function read($done, $user_id) {
		$request = $this->_bdd->prepare('SELECT * FROM objectifs WHERE id_membres = :id_membres AND done = :done ORDER BY id DESC');
		$request->execute(array(
			'id_membres' => $this->getIdMember(),
			'done' => $done,
			));
		$objectives = $request->fetchAll();
		$request->closeCursor();
		$objectives = $this->categoryName($objectives);
		foreach ($objectives as &$value) {
			$value['already_follow'] = $this->alreadyFollow($value, $user_id);
		}
		return $objectives;
	}

	public function read5Last($done, $user_id) {
		$request = $this->_bdd->prepare('SELECT * FROM objectifs WHERE id_membres = :id_membres AND done = :done ORDER BY id DESC LIMIT 5');
		$request->execute(array(
			'id_membres' => $this->getIdMember(),
			'done' => $done,
			));
		$objectives = $request->fetchAll();
		$request->closeCursor();
		$objectives = $this->categoryName($objectives);
		foreach ($objectives as &$value) {
			$value['already_follow'] = $this->alreadyFollow($value, $user_id);
		}
		return $objectives;
	}

	public function readFollow($user_id) {
		$request = $this->_bdd->prepare('SELECT o.* ,m.firstname, m.lastname  FROM objectifs AS o, membres AS m, member_follow_objective AS mfo 
			WHERE m.id = o.id_membres AND mfo.id_member = :id_membres AND o.id = mfo.id_objective ORDER BY mfo.id DESC');
		$request->execute(array(
			'id_membres' => $this->getIdMember(),
			));
		$objectives = $request->fetchAll();
		$request->closeCursor();
		$objectives = $this->categoryName($objectives);
		foreach ($objectives as &$value) {
			$value['already_follow'] = $this->alreadyFollow($value, $user_id);
		}
		return $objectives;
	}

	public function updateStatus($done) {
		$request = $this->_bdd->prepare('UPDATE objectifs SET done = :done WHERE id = :id');
		$request->execute(array(
			'id' => $this->getId(),
			'done' => $done,
			));
		$request->closeCursor();
	}

	//for the counter menu_top
	public function countDone() {
		$request = $this->_bdd->prepare('SELECT COUNT(*) FROM objectifs WHERE id_membres = :id_membres');
		$request->execute(
			array(
			'id_membres' => $this->getIdMember(),
			));
		$countTotal = $request->fetch();
		$countTotal = $countTotal[0];
		$request->closeCursor(); 
		$request = $this->_bdd->prepare('SELECT COUNT(*) FROM objectifs WHERE done = :done AND id_membres = :id_membres');
		$request->execute(array(
			'id_membres' => $this->getIdMember(),
			'done' => 1,
			));
		$countDone = $request->fetch(); 
		$countDone = $countDone[0];
		$request->closeCursor();
		if ($countTotal != 0) {
			$count = ($countDone/$countTotal)*100;
			return $count;	
		}
	}

	public function categoryName($objectives) {
		foreach ($objectives as &$value) {
			switch ($value['category']) {
				case 1:
					$value['category'] = "Personnel";
					break;
				case 2:
					$value['category'] = "Professionnel";
					break;
				case 3:
					$value['category'] = "Sportif";
					break;
				case 4:
					$value['category'] = "Fun";
					break;
				default:
					$value['category'] = "Aucune";
					break;
			}
		}
		return $objectives;
	}

	//Count advice already liked
	public function alreadyFollow($objectives, $user_id) {
		$request = $this->_bdd->prepare('SELECT COUNT(*) FROM member_follow_objective WHERE id_objective = :id_objective AND id_member = :id_member');
		$request->execute(
			array(
			'id_objective' => $objectives['id'],
			'id_member' => $user_id,
			));
		$count = $request->fetch();
		$count = $count[0];
		$request->closeCursor(); 	
		return $count;
	}
}
?>