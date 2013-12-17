<div id="page_right_padding">
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
						<?php if ($datas['avatar']) : ?>
							<img class="img_resize_48" src="<?php echo $datas['avatar'] ?>">
						<?php else : ?>
							<img class="img_resize_48" src="/ressources/images/list_users.png">
						<?php endif ?>
					<a class="a_display_for_name" href="/user/profile/<?php echo $datas['id']?>"><?php echo htmlspecialchars($datas['firstname']." ".$datas['lastname']);?></a>
					<div class="form_inline form_modify_friend">
						<div class="id_member form_inline" type="hidden" value="<?php echo $id_member;?>"></div>
						<div class="id_friend_button form_inline" type="hidden" value="<?php echo $datas['id'];?>"></div>
						<img type="image" title="Accepter" value="friend_request_ok" src="/ressources/images/obj_done.png"/>
						<img type="image" title="Refuser" value="delete_friend_button" src="/ressources/images/obj_delete.png"/>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<br/>
		<h4>Amis</h4>
		<ul>
			<?php foreach ($list_friends_accepted as $datas): ?>
				<li class="box_friend_request">
					<?php if ($datas['avatar']) : ?>
						<img class="img_resize_48" src="<?php echo $datas['avatar'] ?>">
					<?php else : ?>
						<img class="img_resize_48" src="/ressources/images/list_users.png">
					<?php endif ?>
					<a class="a_display_for_name" href="/user/profile/<?php echo $datas['id']?>"><?php echo htmlspecialchars($datas['firstname']." ".$datas['lastname']);?></a>
					<div class="form_inline form_modify_friend">
						<div class="id_member form_inline" type="hidden" value="<?php echo $id_member;?>"></div>
						<div class="id_friend_button form_inline" type="hidden" value="<?php echo $datas['id'];?>"></div>
						<img type="image" title="Supprimer" value="delete_friend_button" src="/ressources/images/obj_delete.png"/>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php else : ?>
		<h4>Vous n'avez pas les droits</h4>
		<?php exit(); ?>
	<?php endif ?>
</div>