<div class="page_right_padding">
	<h3 class="form_inline">Objectifs en cours de <a class="a_display_for_name" href="/user/profile/<?php echo $id_member?>"><?php echo htmlspecialchars($user_name['firstname']." ".$user_name['lastname']); ?></a></h3>
	<span> | </span>
	<h5 class="form_inline"><a href="/user/profile/<?php echo $id_member?>">Profil de <?php echo htmlspecialchars($user_name['firstname']); ?></a></h5>
	<?php foreach ($errors as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
	<?php endforeach ?>
	<?php foreach ($success as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
	<?php endforeach ?>
	<?php include($_SERVER['DOCUMENT_ROOT']."/user/template/_current_objective.php"); ?>
</div>