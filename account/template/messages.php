<div class="page_right_padding">
	<?php if ($id_member == $user_id) : ?>
		<h4>En construction</h4>
	<?php else : ?>
		<h4>Vous n'avez pas les droits</h4>
		<?php exit(); ?>
	<?php endif ?>
</div>