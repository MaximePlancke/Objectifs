<div class="all_objectives_content">
	<ul>
		<?php foreach ($done_objectives as $datas): ?>
			<li class="box_content">
				<h4>
					<?php echo UrlToShortLink(htmlspecialchars($datas['name_obj'])); ?>
					<?php if ($id_member == $_SESSION['id']) : ?>
					<form class="form_inline" method="post" action="#">
						<input type="hidden" name="id_objective" value="<?php echo $datas['id'];?>" />
						<input type="image" name="obj_modif" title="Déplacer vers Objectifs en cours" value="obj_modif" src="/ressources/images/obj_modif.png"/>
						<input type="image" name="delete_objective" title="Supprimer" value="delete_objective" src="/ressources/images/obj_delete.png"/>
					</form>
					<?php endif ?>
				</h4>
				<div class="box_click_display_objective_profile">
					<img class="offset6 center_img" src="/ressources/images/display_details.png">
				</div>
				<div class="hidden_part">
					<div class="box_content_steps">
						<ul>
							<h5 class="center_text">Etapes</h5>
							<?php foreach ($steps_objectives as $value) : ?>
								<?php if ($value['id_objective'] == $datas['id']) : ?>
									<li class="box_step">
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
									</li>
								<?php endif ?>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="box_content_advices">
						<ul>
							<h5 class="center_text">Conseils</h5>
							<?php foreach ($advices_objectives as $value): ?>
								<?php if ($value['id_objective'] == $datas['id']) : ?>
									<li class="box_advice">
										<img src="/ressources/images/advice_obj.png">
										<?php echo UrlToShortLink(htmlspecialchars($value['advice_content'])); ?>
										<h6>Ajouté par : <a href="/user/profile/<?php echo $value['id_member_give_advice']?>"><?php echo $value['firstname']." ".$value['lastname'];?></a> le <?php echo $value['date_creation'];?></h6>
									</li>
								<?php endif ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<h6>Catégorie : <?php echo $datas['category'] ?> | Ajouté le : <?php echo $datas['date_creation'] ?></h6>
				</div> 
			</li>
		<?php endforeach; ?>
	</ul>
</div>