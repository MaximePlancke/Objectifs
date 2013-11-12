<h4>Nouvel Objectif</h4>
<form method="post" class="well form-inline" action="objective-new">
	<ul>
		<?php foreach ($errors as $value): ?>
			<li>
				<?php echo $value;?>
			</li>
		<?php endforeach ?>
	</ul>
	<br/>
	<p><label for="name_obj"/>Votre objectif</label><br/>
	<input type="text" id="name_obj" name="name_obj" autofocus required/>
	<br/><br/>
	<label for="nb_steps">Nombre d'étapes (Entre 1 et 15)</label><br/>
	<input type="number" id="nb_steps" name="nb_steps" min="0" max="15" value="1" step="1" onkeypress="return false;" />
	<br/><br/>
		<input type="submit" value="C'est parti!" class="btn btn-primary"/></p>
	</form>
