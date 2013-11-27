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
				<li>
					<h4><?php echo $datas['name_obj']; ?></h4>
					<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5> 
					<h6><a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Voir les conseils</a></h6>
					<h6><a href="/done/objective/<?php echo $id_member;?>/<?php echo $datas['id'];?>/delete">Supprimer</a></h6>
					<h6><a href="/done/objective/<?php echo $id_member;?>/<?php echo $datas['id'];?>/obj_modif">Modifier Objectif</a></h6>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>	