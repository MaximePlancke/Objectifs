<h3>Ajouter un conseil</h3>
<form method="post" class="well form-inline" action="/index.php?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $id_objective;?>&amp;page=add_advice">
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
	<a href="/index.php?id=<?php echo $id_member;?>&amp;page=current_obj">Revenir aux objectifs</a>
			