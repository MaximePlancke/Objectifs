<link rel="stylesheet" type="text/css" href="/ressources/css/jquery.custombox.css">
<?php if ($user_id) : ?>
	<div id="page_right_padding">
<?php else : ?>
<div id="page_connexion_color">
<?php endif; ?>

	<br/><br/><br/>
	<h1 class="big_title">Bienvenue sur OBShare</h1>
	<h2 class="big_title">Version Beta 1.4</h2>
	<br/>
	<?php if ($_SESSION) : ?>
		<h2 class="center_text">Première visite?</h2>
		<div class="icon_explanation">
			<button id="popup_explanation" class="btn btn-primary btn-large"><i class="icon-white icon-circle-arrow-right"></i> Explications</button>
		</div>
	<?php endif; ?>
</div>
