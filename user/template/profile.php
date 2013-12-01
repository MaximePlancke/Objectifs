<div class="page_right_padding">

		<h2><?php echo ($user_name['pseudo']); ?></h2>	
	<ul>
		<?php foreach ($objectives as $datas): ?>
			<li class="box_content">
				<h4>
					<?php echo $datas['name_obj']; ?>
				</h4>
				<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5> 
				<div class="hidden_part">
					<h6>Catégorie : <?php echo $datas['category'] ?></h6>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>