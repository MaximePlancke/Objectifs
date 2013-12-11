<div class="page_right_padding">
	<h2><?php echo htmlspecialchars($user_name['firstname']." ".$user_name['lastname']); ?></h2>	
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
								<?php echo UrlToShortLink(htmlspecialchars($value['advice_content'])); ?>
								<h6>Pour l'objectif : <?php echo $value['name_obj'];?></h6>
							</li>
						<?php endif ?>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
	</div>
</div>