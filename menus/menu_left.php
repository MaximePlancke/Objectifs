<?php 
	$request = $bdd->query('SELECT id, pseudo FROM membres ORDER BY id DESC');
	$list_users = $request->fetchAll();
	$request->closeCursor();

	$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

	$user = new User();
	$user->setDb($bdd);
	$user->setId($user_id);
	$list_friends = $user->listFriends();
?>

<div id="menu_left">
		<h4>Fonctionnalités</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/users">Gestion des amis</a></li>
		</ul>
		<h4>Objectifs</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/objective/new">Nouvel Objectif</a></li>
			<li class="menu_responsive"><a href="/current/objective/<?php echo $user_id?>">Objectifs en cours</a></li>
			<li class="menu_responsive"><a href="/done/objective/<?php echo $user_id?>">Objectifs terminés</a></li>
		</ul>
		<h4>Amis</h4>
		<ul class="nav">
			<?php foreach ($list_friends as $datas): ?>
				<li><a href="/current/objective/<?php echo $datas['id']?>"><?php echo $datas['pseudo'];?></a></li>
			<?php endforeach; ?>
		</ul>
		<h4>Mon Compte</h4>
		<ul class="nav">
			<li id="action_delete_account" class="menu_responsive"><a href="/account/delete">Supprimer son compte</a></li>
		</ul>
	<h4>Utilisateurs</h4>
	<ul class="nav">
		<?php foreach ($list_users as $datas): ?>
			<li><?php echo $datas['pseudo'];?></li>
		<?php endforeach;?>
	</ul>
</div>