<<<<<<< HEAD
<h4>Connection</h4>
<form method="post" class="well form-inline" action="/account/login">
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
	<h4><a href="/account/registration">Nouvelle inscription</a></h4>
			
=======
<div id="page_connexion_color">
	<h1 class="big_title"><span style="color:black;">OB</span>Share</h1><br/>
	<h1 class="big_title">Connection</h1><br/>
	<form method="post" class="login_registration_form well form-inline" action="/account/login">
		<?php if(count($errors) > 0): ?>
		<ul>
			<?php foreach ($errors as $value): ?>
				<li><?php echo $value; ?></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
			<label for="name_utilisateur"/>Nom utilisateur</label><br/>
			<input type="text" id="name_utilisateur" name="name_utilisateur" class=autofocus required/><br/><br/>
			<label for="password_utilisateur">Mot de passe</label><br/>
			<input type="password" id="password_utilisateur" name="password_utilisateur" class=autofocus required/><br/><br/>
			<input type="submit" value="Connection" class="btn btn-primary"/>
			<h6><a href="">Mot de passe oublié?</a></h6>
			<h4><a href="/account/registration">Nouvelle inscription</a></h4>
	</form>
</div>	
>>>>>>> opti/css-structure-du-site
