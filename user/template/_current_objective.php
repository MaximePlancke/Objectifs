<div class="all_objectives_content">
		<ul>
			<?php foreach ($current_objectives as $datas): ?>
				<li class="box_content">
					<h4>
						<?php echo UrlToShortLink(htmlspecialchars($datas['name_obj'])); ?>
						<?php if ($id_member == $user_id) : ?>
						<form class="form_inline" method="post" action="#">
							<input type="hidden" name="id_objective" value="<?php echo $datas['id'];?>" />
							<input type="image" name="done_objective" title="Objectif terminé" value="done_objective" src="/ressources/images/obj_done.png"/>
							<input type="image" name="delete_objective" title="Supprimer" value="delete_objective" src="/ressources/images/obj_delete.png"/>
						</form>
						<?php endif ?>
					</h4>
					<div class="box_click_display_objective_profile">
						<img class="center_img offset6" src="/ressources/images/display_details.png">
					</div>
					<div class="hidden_part">
						<?php //Steps ?>
						<div class="box_content_steps">
							<ul>
								<h5 class="center_text">Etapes</h5>
								<?php foreach ($steps_objectives as $value) : ?>
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
											<?php if ($id_member == $user_id) : ?>
												<form class="form_inline form_modif_steps" method="post" action="#">
													<input class="step_id" type="hidden" name="step_id" value="<?php echo $value['id'];?>" />
													<input class="id_member" type="hidden" name="id_member" value="<?php echo $id_member;?>" />
													<input class="step_done step_done_done" type="image" name="done" title="Etape terminé" value="1" src="/ressources/images/obj_done.png"/>
													<input class="step_done step_done_modif" type="image" name="done" title="Etape non terminé" value="0" src="/ressources/images/obj_delete.png"/>
												</form>
											<?php endif ?>
										</li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
						</div>
						<?php //Advices ?>
						<div class="box_content_advices">
							<ul>
								<h5 class="center_text">Conseils</h5>
								<?php foreach ($advices_objectives as $value): ?>
									<?php if ($value['id_objective'] == $datas['id']) : ?>
										<li class="box_advice">
											<img src="/ressources/images/advice_obj.png">
											<?php echo UrlToShortLink(htmlspecialchars($value['advice_content'])); ?>
											<?php if ($id_member == $user_id OR $value['id_member_give_advice'] == $user_id) : ?>
												<div class="form_inline form_modif_advices">
													<img class="delete_advice" title="Supprimer" value="delete_advice" src="/ressources/images/obj_delete.png"/>
													<div class="id_advice" type="hidden" value="<?php echo $value['id'];?>"></div>
													<div class="id_member" type="hidden" value="<?php echo $id_member;?>"></div>
													<div class="id_member_give_advice" type="hidden" value="<?php echo $value['id_member_give_advice'] ?>"></div>
												</div>
											<?php endif ?>
											<h6>Ajouté par : <a href="/user/profile/<?php echo $value['id_member_give_advice']?>"><?php echo $value['firstname']." ".$value['lastname'];?></a> le <?php echo $value['date_creation'];?></h6>
										</li>
									<?php endif ?>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php //Add advice ?>
						<form class="add_advice_form" method="post" action="#">
							<input type="hidden" name="id_objective" value="<?php echo $datas['id'];?>" />
							<textarea id="new_advice" name="new_advice" rows=2 class="span12" onFocus="this.value=''" required>Ajouter un conseil</textarea>
							<input type="submit" value="Valider le conseil" class="btn"/></p>
						</form>
						<h6>Catégorie : <?php echo $datas['category'] ?> | Ajouté le : <?php echo $datas['date_creation'] ?></h6>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>