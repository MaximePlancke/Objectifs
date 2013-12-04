<div class="page_right_padding">
	<h2><?php echo htmlspecialchars($user_name['pseudo']); ?></h2>	
	<ul>
		<li class="box_content_profile">
			<h4 style="text-align:center;">5 derniers objectifs en cours</h4>
			<div style="text-align:center;">
				<a href="/current/objective/<?php echo $id_member?>">Voir la liste compléte et les détails</a>		
			</div>
		</li>
	</ul>
	<ul>
		<?php foreach ($current_objectives as $datas): ?>
			<li class="box_content_objective_profile">
				<h4 class="form_inline">
					<?php echo htmlspecialchars($datas['name_obj']); ?>
				</h4>
				<span> | </span>
				<h6 class="form_inline">Catégorie : <?php echo $datas['category'] ?></h6>
			</li>
		<?php endforeach; ?>
	</ul>
	<ul>
		<li class="box_content_profile">
			<h4 class="center_text">5 derniers objectifs terminés</h4>
			<div class="center_text">
				<a href="/done/objective/<?php echo $id_member?>">Voir la liste compléte et les détails</a>	
			</div>
		</li>
	</ul>
	<ul>
		<?php foreach ($done_objectives as $datas): ?>
			<li class="box_content_objective_profile">
				<h4 class="form_inline">
					<?php echo htmlspecialchars($datas['name_obj']); ?>
				</h4>
				<span> | </span>
				<h6 class="form_inline">Catégorie : <?php echo $datas['category'] ?></h6>
			</li>
		<?php endforeach; ?>
	</ul>
</div>