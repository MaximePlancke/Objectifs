<div id="page_right_padding">
	<h3>Liste des utilisateurs</h3>
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
	<ul>
		<?php foreach ($list_users as $datas) : ?>
		<li class="box_users">
			<div class="box_name_box_users">
				<?php if ($datas['avatar']) : ?>
					<img class="img_resize_48" src="<?php echo $datas['avatar'] ?>">
				<?php else : ?>
					<img class="img_resize_48" src="/ressources/images/list_users.png">
				<?php endif ?>
				<a class="a_display_for_name" href="/user/profile/<?php echo $datas['id']?>"><?php echo htmlspecialchars(stripslashes($datas['firstname']." ".$datas['lastname']));?></a>
			</div>
			<form method="post" action="/users">
				<input class="id_friend_button" type="hidden" name="id_friend_button" value="<?php echo $datas['id'];?>" />
				<?php if ($datas['already_friend'] == 0) : ?>
					<input class="add_friend_button btn btn-primary" name="add_friend_button" type="submit" value="Ajouter"/>
				<?php else : ?>
					<?php if ($datas['already_friend_confirm'] == 0) : ?>
						<input class="delete_friend_button btn" name="delete_friend_button" type="submit" value="Supprimer"/>
					<?php else : ?>
						<input class="btn disabled" type="button" value="En attente de confirmation"/>
					<?php endif ?>
				<?php endif ?>
			</form>
		</li>
		<?php endforeach ?>
	</ul>
	<?php //Resolve display problem ?>
	<div><p style="color:white;">OBShare</p></div>	
</div>