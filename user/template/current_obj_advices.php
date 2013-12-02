<div class="page_right_padding">
	<?php foreach ($objective_name as $datas) { ?>
		<h3><?php echo $datas['name_obj'];?></h3>
	<?php } ?>
	<div>
		<?php foreach ($errors as $value): ?>
			<h5><?php echo $value; ?></h5><br/>
		<?php endforeach ?>
		<?php foreach ($success as $value): ?>
			<h5><?php echo $value; ?></h5><br/>
		<?php endforeach ?>
		<ul>
			<?php foreach ($advices as $datas): ?>
				<li class="box_content">
					<h4>
						<?php echo UrlToShortLink(htmlentities($datas['advice_content'])); ?>
						<?php if ($id_member == $_SESSION['id'] OR $datas['id_member_give_advice'] == $_SESSION['id']) : ?>
							<a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id_objective'];?>/<?php echo $datas['id_advice'];?>/<?php echo $datas['id_member_give_advice'] ?>/delete"><img title="Supprimer" src="/ressources/images/obj_delete.png"></a>
						<?php endif ?>
					</h4>
					<h5>Ajouté par : <a href="/current/objective/<?php echo $datas['id']?>"><?php echo $datas['pseudo'];?></a> le <?php echo $datas['date_creation'];?></h5>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>