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
		<li class="menu_responsive"><a href="/account/login">Connexion</a></li>
		<li class="menu_responsive"><a href="/account/registration">Inscription</a></li>
		<li class="menu_responsive"><a href="/account/delete">Supprimer son compte</a></li>
	</ul>

	<?php if ($user_id): ?>
		<h4>Fonctionnalités</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/users">Gestion des amis</a></li>
		</ul>
		<h4>Objectifs</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/objective/new">Nouveau Objectif</a></li>
			<li class="menu_responsive"><a href="/current/objective/<?php echo $user_id?>">Objectif en cours</a></li>
			<li class="menu_responsive"><a href="/current/objective/<?php echo $user_id?>">Objectif terminé</a></li>
		</ul>
		<h4>Amis</h4>
		<ul class="nav">
			<?php foreach ($list_friends as $datas): ?>
				<li><a href="/current/objective/<?php echo $datas['id_friends_2']?>"><?php echo $datas['pseudo'];?></a></li>
			<?php endforeach; ?>
		</ul>
	<?php endif ?>
	<h4>Utilisateurs</h4>
	<ul class="nav">
		<?php foreach ($list_users as $datas): ?>
			<li><?php echo $datas['pseudo'];?></li>
		<?php endforeach;?>
	</ul>
</div>