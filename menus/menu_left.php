<?php 
	$request = $bdd->query('SELECT id, pseudo FROM membres ORDER BY id DESC');
	$list_users = $request->fetchAll();
	$request->closeCursor();

	$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

	$request = $bdd->prepare
		('SELECT f.id, m.id, f.id_friends_1, f.id_friends_2, m.pseudo, m.id 
		FROM friends AS f, membres AS m 
		WHERE f.id_friends_2 = m.id 
		AND f.id_friends_1 = :user_id
		OR (f.id_friends_1 = m.id AND f.id_friends_2 = :user_id)
		ORDER BY f.id DESC');
	$request->execute(array('user_id' => $user_id));
    $list_friends = $request->fetchAll();
	$request->closeCursor();
?>

<div id="menu_left">
	<h4>Mon Compte</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="log_in.html"><p>Connexion</p></a></li>
		<li class="menu_responsive"><a href="registration.html"><p>Inscription</p></a></li>
		<li class="menu_responsive"><a href="delete_account.html"><p>Supprimer son compte</p></a></li>
	</ul>

	<?php if ($user_id): ?>
	<h4>Fonctionnalités</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="add_friends.html">Gestion des amis</a></li>
	</ul>
	<h4>Objectifs</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="new_objective.html"><p>Nouveau Objectif</p></a></li>
		<li class="menu_responsive"><a href="current_obj-<?php echo $user_id?>.html"><p>Objectif en cours</p></a></li>
		<li class="menu_responsive"><a href="current_obj-<?php echo $user_id?>.html"><p>Objectif terminé</p></a></li>
	</ul>
	<h4>Amis</h4>
	<ul class="nav">
		<?php foreach ($list_friends as $datass): ?>
			<li><?php echo $datass['pseudo'];?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif ?>
	<h4>Utilisateurs</h4>
	<ul class="nav">
		<?php foreach ($list_users as $datas): ?>
			<li><a href="current_obj-<?php echo $datas['id']?>.html"><?php echo $datas['pseudo'];?></a></li>
		<?php endforeach;?>
	</ul>
</div>