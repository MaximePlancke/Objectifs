<div class="page_right_padding">
	<h3>Ajouter un conseil</h3>
	<ul>
		<?php foreach ($errors as $value): ?>
			<li>
				<h5><?php echo $value; ?></h5>
			</li>
		<?php endforeach ?>
	</ul>
	<form method="post" class="well form-inline" action="/add/advice/<?php echo $id_member;?>/<?php echo $id_objective ?>">
		<input type="hidden" name="id_objective" value="<?php echo $id_objective;?>" />
		<p><label for="name_advice"/>Votre Conseil</label><br/>
		<textarea id="name_advice" name="name_advice" rows=4 class="span5" required></textarea>
		<br/><br/>
		<input type="submit" value="Valider le conseil" class="btn btn-primary"/></p>
	</form>
	<a href="/current/advices/<?php echo $id_member;?>/<?php echo $id_objective;?>">Voir les conseils</a>
</div>