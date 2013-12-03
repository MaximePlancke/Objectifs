<div class="page_right_padding">
	<h3>Objectifs en cours</h3>
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
						<form class="form_inline" method="post" action="/current/objective/<?php echo $id_member;?>">
							<input type="hidden" name="id_objective" value="<?php echo $datas['id'];?>" />
							<input type="image" name="done" title="Objectif terminé" value="done" src="/ressources/images/obj_done.png"/>
							<input type="image" name="delete" title="Supprimer" value="delete" src="/ressources/images/obj_delete.png"/>
						</form>
						<?php endif ?>
					</h4>
					<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5> 
					<div class="hidden_part">
						<div class="box_content_steps">
							<?php foreach ($steps_objectives as $value) : ?>
								<ul>
									<?php if ($value['id_objective'] == $datas['id']) : ?>
										<li class="box_step" value="<?php echo $value['done'];?>">
											<?php switch ($value['done']) {
												case 0:
													echo '<img src="/ressources/images/current_step.png">';
													break;
												case 1:
													echo '<img src="/ressources/images/done_step.png">';
													break;
												
												default:
													echo '<img src="/ressources/images/current_step.png">';
													break;
											} ?>
											<?php echo UrlToShortLink(htmlspecialchars($value['steps_content'])); ?>
											<?php if ($id_member == $_SESSION['id']) : ?>
												<form class="form_inline form_modif_steps" method="post" action="/current/objective/<?php echo $id_member;?>">
													<input class="step_id" type="hidden" name="step_id" value="<?php echo $value['id'];?>" />
													<input class="step_done step_done_done" type="image" name="done" title="Etape terminé" value="1" src="/ressources/images/obj_done.png"/>
													<input class="step_done step_done_modif" type="image" name="done" title="Etape terminé" value="0" src="/ressources/images/obj_delete.png"/>
												</form>
											<?php endif ?>
										</li>
									<?php endif ?>
								</ul>
							<?php endforeach ?>
						</div>
						<h5 class ="form_inline">Conseil : </h5>
						<a href="/add/advice/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Ajouter</a>
						<span> | </span>
						<a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Voir</a>
						<h6>Catégorie : <?php echo $datas['category'] ?> | Ajouté le : <?php echo $datas['date_creation'] ?></h6>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>