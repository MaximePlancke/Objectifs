<?php

$id_objective = isset($_POST['id_objective']) ? $_POST['id_objective'] : null;
$id_advice    = isset($_POST['id_advice']) ? $_POST['id_advice'] : null;

$objective = new Objective($bdd);

$steps_objective = new StepsObjective($bdd);

$advices_objective = new Advice($bdd);

$filter_done_id			= isset($_POST['filter_done_id']) ? $_POST['filter_done_id'] : null;
$filter_category_id 	= isset($_POST['filter_category_id']) ? $_POST['filter_category_id'] : null;
$filter_friend_id		= isset($_POST['filter_friend_id']) ? $_POST['filter_friend_id'] : null;

$filter = array();

if ($filter_done_id != 3) {
	$filter['where'][] = 'done=:done';
	$filter['argumentPDO']['done'] = $filter_done_id;
} 
if ($filter_category_id != 0) {
	$filter['where'][] = 'category=:category';
	$filter['argumentPDO']['category'] = $filter_category_id;
} 
// if ($filter_friend_id != 0) {
// 	$filtre3['where'][] = 'done=:done';
// 	$filtre3['argumentPDO']['done'] = $filter_friend_id;
// } 

// Get objective.
$objectives = $objective->readAll($user_id, $filter);
// Get steps from objective
$steps_objectives = $steps_objective->read();
// Get advices from objective selected.
$advices_objectives = $advices_objective->read($user_id);

?>