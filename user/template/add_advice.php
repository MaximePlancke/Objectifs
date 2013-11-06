<h3>Ajouter un conseil</h3>
<form method="post" class="well form-inline" action="add_advice-<?php echo $id_member;?>-<?php echo $id_objective;?>.html">
		<ul>
			<?php foreach ($errors as $value): ?>
				<li>
					<h5><?php echo $value; ?></h5>
				</li>
			<?php endforeach ?>
		</ul>
	<p><label for="name_advice"/>Votre Conseil</label><br/>
	<textarea id="name_advice" name="name_advice" rows=4 class="span5" required autofocus></textarea>
	<br/><br/>
	<input type="submit" value="Valider le conseil" class="btn btn-primary"/></p>
</form>
<a href="current_obj-<?php echo $id_member?>.html">Revenir aux objectifs</a>
			