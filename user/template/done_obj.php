<div class="page_right_padding">
	<h3>Objectifs terminés</h3>
	<div>
		<?php foreach ($errors as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
		<?php endforeach ?>
		<?php foreach ($success as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
		<?php endforeach ?>
		<ul>
			<?php foreach ($objectives as $datas): ?>
				<li class="box_content">
					<h4>
						<?php echo UrlToShortLink(htmlspecialchars($datas['name_obj'])); ?>
						<?php if ($id_member == $_SESSION['id']) : ?>
						<form class="form_inline" method="post" action="/done/objective/<?php echo $id_member;?>">
							<input type="hidden" name="id_objective" value="<?php echo $datas['id'];?>" />
							<input type="image" name="obj_modif" title="Déplacer vers Objectifs en cours" value="obj_modif" src="/ressources/images/obj_modif.png"/>
							<input type="image" name="delete" title="Supprimer" value="delete" src="/ressources/images/obj_delete.png"/>
						</form>
						<?php endif ?>
					</h4>
					<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5>
					<div class="hidden_part">
						<?php foreach ($steps_objectives as $value) : ?>
							<ul>
								<?php if ($value['id_objective'] == $datas['id']) : ?>
									<li>
										<?php echo UrlToShortLink(htmlspecialchars($value['steps_content'])); ?>
									</li>
								<?php endif ?>
							</ul>
						<?php endforeach ?>
						<br/>
						<a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Voir les conseils</a>
						<h6>Catégorie : <?php echo $datas['category'] ?></h6>
					</div> 
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>	