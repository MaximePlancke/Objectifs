<?php 
	$request = $bdd->query('SELECT id, pseudo FROM membres ORDER BY id DESC');
	$list_users = $request->fetchAll();
	$request->closeCursor();

	$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

	$request = $bdd->prepare('SELECT friends.id, membres.id, friends.id_friends_1, friends.id_friends_2, membres.pseudo, membres.id FROM friends, membres WHERE friends.id_friends_1 = ? AND friends.id_friends_2 = membres.id ORDER BY friends.id DESC');
	$request->execute(array($user_id));
    $list_friends = $request->fetchAll();
	$request->closeCursor();
?>

<div id="menu_left">
	<h4>Mon Compte</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="/account/log_in.php"><p>Connexion</p></a></li>
		<li class="menu_responsive"><a href="/account/registration.php"><p>Inscription</p></a></li>
		<li class="menu_responsive"><a href="/account/delete_account.php"><p>Supprimer son compte</p></a></li>
	</ul>

	<?php if ($user_id): ?>
	<h4>Fonctionnalités</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="/user/add_friends.php?id=<?php echo $user_id;?>">Gestion des amis</a></li>
	</ul>
	<h4>Objectifs</h4>
	<ul class="nav">
		<li class="menu_responsive"><a href="/objective/new_objective.php"><p>Nouveau Objectif</p></a></li>
		<li class="menu_responsive"><a href="/user/current_obj.php?id=<?php echo $user_id?>"><p>Objectif en cours</p></a></li>
		<li class="menu_responsive"><a href="/user/current_obj.php?id=<?php echo $user_id?>"><p>Objectif terminé</p></a></li>
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
			<li><a href="/user/current_obj.php?id=<?php echo $datas['id'];?>"><?php echo $datas['pseudo'];?></a></li>
		<?php endforeach;?>
	</ul>
</div>