<div id="menu_left">
		<ul class="nav">
			<li class="menu_responsive"><a href="/common/explore">Explorez !</a></li>
		</ul>
		<h4>Objectifs</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/objective/new">Nouvel Objectif</a></li>
			<li class="menu_responsive"><a href="/current/objective/<?php echo $id_member_session?>">Objectifs en cours</a></li>
			<li class="menu_responsive"><a href="/done/objective/<?php echo $id_member_session?>">Objectifs terminés</a></li>
		</ul>
		<h4>Fonctionnalités</h4>
		<ul class="nav">
			<li class="menu_responsive"><a href="/users">Utilisateurs</a></li>
			<li class="menu_responsive"><a href="/account/friends/<?php echo $id_member_session?>">Amis</a></li>
		</ul>
		<h4>Mon Compte</h4>
		<ul class="nav">
			<li id="action_delete_account" class="menu_responsive"><a href="/account/delete">Supprimer son compte</a></li>
		</ul>
</div>