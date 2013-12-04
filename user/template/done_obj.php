<div class="page_right_padding">
	<h3 class="form_inline">Objectifs terminés de <a class="a_display_for_pseudo" href="/user/profile/<?php echo $id_member?>"><?php echo htmlspecialchars($user_name['pseudo']); ?></a></h3>
	<span> | </span>
	<h5 class="form_inline"><a href="/user/profile/<?php echo $id_member?>">Profil de <?php echo htmlspecialchars($user_name['pseudo']); ?></a></h5>
	<div class="all_objectives_content">
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
							<input type="image" name="delete_objective" title="Supprimer" value="delete_objective" src="/ressources/images/obj_delete.png"/>
						</form>
						<?php endif ?>
					</h4>
					<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5>
					<div class="box_click_display_objective">
						<h5 class="center_text">Afficher les détails</h5>
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
											<h6>Ajouté par : <a href="/user/profile/<?php echo $value['id_member_give_advice']?>"><?php echo $value['pseudo'];?></a> le <?php echo $value['date_creation'];?></h6>
										</li>
									<?php endif ?>
								<?php endforeach; ?>
							</ul>
						</div>
						<h5 class ="form_inline">Conseil : </h5>
						<a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Voir</a>
						<h6>Catégorie : <?php echo $datas['category'] ?> | Ajouté le : <?php echo $datas['date_creation'] ?></h6>
					</div> 
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>	