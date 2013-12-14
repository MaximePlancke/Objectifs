<?php
	require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

	function loadClass($class) {
	  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
	}
	spl_autoload_register('loadClass');

	$filter = array();

	$filter_done_id				= isset($_POST['filter_done_id']) ? $_POST['filter_done_id'] : null;
	$filter_category_id 		= isset($_POST['filter_category_id']) ? $_POST['filter_category_id'] : null;
	// $filter_friend_id			= isset($_POST['filter_friend_id']) ? $_POST['filter_friend_id'] : null;

	$objective = new Objective($bdd);

	var_dump($filter_done_id);

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
$request = $bdd->prepare('SELECT o.*, m.firstname, m.lastname FROM objectifs AS o , membres AS m  WHERE m.id = o.id_membres AND '.implode(' AND ', $filter['where']).' ORDER BY id DESC');
$request->execute(
	$filter['argumentPDO']
	);
$objectives = $request->fetchAll();
$request->closeCursor();
echo json_encode($objectives);

?>