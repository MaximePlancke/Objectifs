<h2>Qui voulez vous ajouter?</h2>
	<ul>
		<?php foreach ($errors as $value): ?> 
			<li>
				<?php echo $value; ?>
			</li>
		<?php endforeach ?>
	</ul>
	<ul>
		<?php foreach ($list_users as $datas) : ?>
		<li>
			<?php echo $datas['pseudo'];?>
			<form method="post" action="/users">
				<input type="hidden" name="id_friend" value="<?php echo $datas['id'];?>" />
				<input name="add" id="add" type="submit" value="Ajouter" class="btn btn-primary"/>
				<input name="delete" id="delete" type="submit" value="Supprimer" class="btn btn-primary"/>
			</form>
		</li>
		<?php endforeach ?>					
	</ul>
