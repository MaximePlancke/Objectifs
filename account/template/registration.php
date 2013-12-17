<div id="page_connexion_color">
	<h1 class="big_title"><span style="color:black;">OB</span>Share</h1>
	<h1 class="big_title">Inscription</h1>
	<br/>
	<form method="post" class="login_registration_form well form-inline" action="/account/registration" enctype="multipart/form-data">
		<ul>
			<?php foreach ($errors as $value): ?>
				<li>
					<?php echo $value; ?>
				</li>
			<?php endforeach ?>
		</ul>
		<p><label for="firstname"/>Prénom</label><br/>
		<input type="text" id="firstname" name="firstname" class=autofocus/>
		<br/><br/>
		<p><label for="lastname"/>Nom</label><br/>
		<input type="text" id="lastname" name="lastname" class=autofocus/>
		<br/><br/>
		<label for="password_utilisateur">Mot de passe</label><br/>
		<input type="password" id="password_utilisateur" name="password_utilisateur" class=autofocus required/>
		<br/><br/>
		<label for="password_utilisateur2">Mot de passe (Vérification)</label><br/>
		<input type="password" id="password_utilisateur2" name="password_utilisateur2" class=autofocus required/>
		<br/><br/>
		<label for="email_utilisateur">Adresse Email</label><br/>
		<input type="email" id="email_utilisateur" name="email_utilisateur" class=autofocus required/>
		<br/><br/>
		<label for="avatar_utilisateur">Avatar (2 MB Max)</label><br/>
		<input type="file" id="avatar_utilisateur" name="avatar_utilisateur"/>
		<br/><br/>
		<input type="submit" value="Inscription" class="btn btn-primary"/></p>
	</form>
</div>