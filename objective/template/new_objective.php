<div class="page_right_padding">
<h4 class="big_title">Nouvel Objectif</h4>
	<form method="post" class="login_registration_form well form-inline" action="/objective/new">
		<ul>
			<?php foreach ($errors as $value): ?>
				<li>
					<?php echo $value;?>
				</li>
			<?php endforeach ?>
		</ul>
		<label for="name_obj"/>Votre objectif</label><br/>
		<input type="text" id="name_obj" name="name_obj" required/>
		<br/><br/>
		<label for="category"/>Catégorie</label><br/>
		<select name="category">
			<option value="1">Personnel</option> 
			<option value="2">Professionnel</option>
			<option value="3">Sportif</option>
			<option value="4">Fun</option>
		</select>
		<br/><br/>
		<label for="nb_steps_add">Nombre d'étapes</label><br/>
		<select id="nb_steps_add" name="nb_steps_add">
			<option value="0">0</option> 
			<option value="1">1</option> 
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<div id="box_steps_content"></div>
		<br/><br/>
		<input type="submit" value="C'est parti!" class="btn btn-primary"/>
	</form>
</div>
