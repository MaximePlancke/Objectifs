<div class="page_connexion_color">
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
			<label for="email"/>Email</label><br/>
			<input type="text" id="email" name="email" class=autofocus required/><br/><br/>
			<label for="password_user">Mot de passe</label><br/>
			<input type="password" id="password_user" name="password_user" class=autofocus required/><br/><br/>
			<input type="submit" value="Connection" class="btn btn-primary"/>
			<h6><a href="">Mot de passe oublié?</a></h6>
			<h4><a href="/account/registration">Nouvelle inscription</a></h4>
	</form>
</div>	