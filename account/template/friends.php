<div class="page_right_padding">
	<?php if ($id_member == $user_id) : ?>
		<ul>
			<?php foreach ($errors as $value): ?> 
				<li>
					<?php echo $value; ?>
				</li>
			<?php endforeach ?>
			<?php foreach ($success as $value): ?> 
				<li>
					<?php echo $value; ?>
				</li>
			<?php endforeach ?>
		</ul>
		<h4>Demande d'amis en attente</h4>
		<ul>
			<?php foreach ($list_friends_request as $datas): ?>
				<li class="box_friend_request">
					<img src="/ressources/images/list_users.png">
					<a class="a_display_for_name" href="/user/profile/<?php echo $datas['id']?>"><?php echo htmlspecialchars($datas['firstname']." ".$datas['lastname']);?></a>
					<form class="form_inline" method="post" action="#">
						<input type="hidden" name="id_friend_button" value="<?php echo $datas['id'];?>" />
						<input type="image" name="friend_request_ok" title="Accepter" value="friend_request_ok" src="/ressources/images/obj_done.png"/>
						<input type="image" name="delete_friend_button" title="Refuser" value="delete_friend_button" src="/ressources/images/obj_delete.png"/>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>
		<br/>
		<h4>Amis</h4>
		<ul>
			<?php foreach ($list_friends_accepted as $datas): ?>
				<li class="box_friend_request">
					<img src="/ressources/images/list_users.png">
					<a class="a_display_for_name" href="/user/profile/<?php echo $datas['id']?>"><?php echo htmlspecialchars($datas['firstname']." ".$datas['lastname']);?></a>
					<form class="form_inline" method="post" action="#">
						<input type="hidden" name="id_friend_button" value="<?php echo $datas['id'];?>" />
						<input type="image" name="delete_friend_button" title="Supprimer" value="delete_friend_button" src="/ressources/images/obj_delete.png"/>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php else : ?>
		<h4>Vous n'avez pas les droits</h4>
		<?php exit(); ?>
	<?php endif ?>
</div>