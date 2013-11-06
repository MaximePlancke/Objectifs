<h4>Connection</h4>
<form method="post" class="well form-inline" action="/index.php?page=log_in">
	<?php if(count($errors) > 0): ?>
	<ul>
		<?php foreach ($errors as $value): ?>
			<li><?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	
	<br/>
	<p><label for="name_utilisateur"/>Nom utilisateur</label><br/>
	<input type="text" id="name_utilisateur" name="name_utilisateur" class=autofocus required/>
	<br/><br/>
	<label for="password_utilisateur">Mot de passe</label><br/>
	<input type="password" id="password_utilisateur" name="password_utilisateur" class=autofocus required/>
		<br/><br/>
		<input type="submit" value="Connection" class="btn btn-primary"/></p>
		<h6><a href="">Mot de passe oublié?</a></h6>
	</form>
	<h4><a href="/index.php?page=registration">Nouvelle inscription</a></h4>
			