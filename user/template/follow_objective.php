<div class="page_right_padding">
	<?php if ($id_member == $user_id) : ?>
		<h3 class="form_inline">Objectifs favoris</h3>
		<div class="all_objectives_content">
			<ul>
				<?php foreach ($objectives as $datas): ?>
					<li class="box_content">
						<h4>
							<?php if ($datas['already_follow'] == 0) : ?>
								<button class="btn btn-primary btn-small follow_objective" title="Suivre" value="follow_objective"><i class="icon-white icon-ok"></i></button>
							<?php else : ?>
								<button class="btn btn-primary btn-small follow_objective" title="Ne plus suivre" value="unfollow_objective"><i class="icon-white icon-remove"></i></button>
							<?php endif ?>
							<div class="id_objective form_inline" type="hidden" value="<?php echo $datas['id'];?>"></div>
							<?php echo UrlToShortLink(htmlspecialchars(stripslashes($datas['name_obj']))); ?>
						</h4>
						<div class="box_click_display_objective_profile">
							<img class="center_img offset6" src="/ressources/images/display_details.png">
						</div>
						<div class="hidden_part">
							<div>
								<h6> 
									Par : <a href="/user/profile/<?php echo $datas['id_membres']?>"><?php echo $datas['firstname']." ".$datas['lastname']; ?></a>
									 | <?php if ($datas['done'] == 0 ){ echo "Objectif en cours";} else { echo "Objectif terminé";}?>
								</h6>
							</div>
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
												<?php echo UrlToShortLink(htmlspecialchars(stripslashes($value['steps_content']))); ?>
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
												<?php echo UrlToShortLink(htmlspecialchars(stripslashes($value['advice_content']))); ?>
												<div class="form_inline form_modif_advices">
													<?php //like advice section ?>
													<?php if ($value['already_like'] == 0) : ?>
														<img class="like_advice" title="J'aime" value="like_advice" src="/ressources/images/thumb_up.png"/>
													<?php else : ?>
														<img class="unlike_advice" title="Je n'aime plus" value="unlike_advice" src="/ressources/images/thumb_down.png"/>
													<?php endif ?>
													<?php if ($datas['id_membres'] == $user_id OR $value['id_member_give_advice'] == $user_id) : ?>
														<?php //delete advice section ?>
														<img class="delete_advice" title="Supprimer" value="delete_advice" src="/ressources/images/obj_delete.png"/>
													<?php endif ?>
													<div class="id_advice" type="hidden" value="<?php echo $value['id'];?>"></div>
													<div class="id_member" type="hidden" value="<?php echo $user_id;?>"></div>
													<div class="id_member_give_advice" type="hidden" value="<?php echo $value['id_member_give_advice'] ?>"></div>
												</div>
												<h6>Ajouté par : <a href="/user/profile/<?php echo $value['id_member_give_advice']?>"><?php echo $value['firstname']." ".$value['lastname'];?></a> le <?php echo $value['date_creation'];?> |  
													<span class="box_count_like grey_text"><?php echo $value['like']; ?> J'aime</span>
												</h6>
											</li>
										<?php endif ?>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php if ($datas['done'] == 0) : ?>
								<?php //Add advice ?>
								<div class="add_advice_form">
									<div class="success_add_advice"></div>
									<div class="id_objective" type="hidden" value="<?php echo $datas['id'];?>"></div>
									<textarea class="add_advice_content span12" name="new_advice" rows=2 class="span12" onFocus="this.value=''" required>Ajouter un conseil</textarea>
									<input class="add_advice_submit" type="submit" value="Valider le conseil" class="btn"/>
								</div>
							<?php endif ?>
							<h6>Catégorie : <?php echo $datas['category'] ?> | Ajouté le : <?php echo $datas['date_creation'] ?></h6>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php else : ?>
	<h4>Vous n'avez pas les droits</h4>
	<?php exit(); ?>
	<?php endif ?>
</div>