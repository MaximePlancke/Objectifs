<div class="page_right_padding">
	<h2 class="form_inline"><?php echo htmlspecialchars(stripslashes($user_info['firstname']." ".$user_info['lastname'])); ?>
		<form class="form_inline" method="post" action="#">
			<?php if ($user_id != $id_member) : ?>
				<?php if ($user_info['already_friend'] == 0) : ?>
					<input class="add_friend_button btn btn-primary" name="add_friend_button" type="submit" value="Ajouter"/>
				<?php else : ?>
					<?php if ($user_info['already_friend_confirm'] == 0) : ?>
						<input class="delete_friend_button btn" name="delete_friend_button" type="submit" value="Supprimer"/>
					<?php else : ?>
						<input class="btn disabled" type="button" value="En attente de confirmation"/>
					<?php endif ?>
				<?php endif ?>
			<?php endif ?>	
		</form>
	</h2>	
	<?php foreach ($errors as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
	<?php endforeach ?>
	<?php foreach ($success as $value): ?>
		<h5><?php echo $value; ?></h5><br/>
	<?php endforeach ?>
	<ul>
		<li class="box_content_profile">
			<h4 style="text-align:center;">5 derniers objectifs en cours</h4>
			<div style="text-align:center;">
				<a href="/current/objective/<?php echo $id_member?>">Voir la liste compléte et les détails</a>		
			</div>
		</li>
	</ul>
	<?php include($_SERVER['DOCUMENT_ROOT']."/user/template/_current_objective.php"); ?>
	<ul>
		<li class="box_content_profile">
			<h4 class="center_text">5 derniers objectifs terminés</h4>
			<div class="center_text">
				<a href="/done/objective/<?php echo $id_member?>">Voir la liste compléte et les détails</a>	
			</div>
		</li>
	</ul>
	<?php include($_SERVER['DOCUMENT_ROOT']."/user/template/_done_objective.php"); ?>
	<ul>
		<li class="box_content_profile">
			<h4 class="center_text">5 derniers conseils donnés</h4>
			<div class="center_text">
				<!-- <a href="/advices/<?php echo $id_member?>">Voir la liste compléte et les détails</a>	 -->
			</div>
		</li>
	</ul>
	<div class="all_objectives_content">
		<ul>
			<li class="box_content">
				<ul>
					<?php foreach ($last_advices_user as $value): ?>		
						<?php if ($value['id_member_give_advice'] == $id_member) : ?>
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
									<div class="id_advice" type="hidden" value="<?php echo $value['id'];?>"></div>
								</div>
								<h6>Pour l'objectif : <?php echo $value['name_obj'];?>
									<br/><br/><p class="box_count_like grey_text"><?php echo $value['like']; ?> J'aime</p>
								</h6>
							</li>
						<?php endif ?>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
	</div>
</div>