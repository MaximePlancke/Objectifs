<h3>Objectifs en cours</h3>
<div>
	<?php foreach ($errors as $value): ?>
	<h5><?php echo $value; ?></h5><br/>
	<?php endforeach ?>
	<ul>
		<?php foreach ($objectives as $datas): ?>
			<li>
				<h4><?php echo $datas['name_obj']; ?></h4>
				<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5> 
				<h6><a href="?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>&amp;page=add_advice">Donner un conseil</a></h6>
				<h6><a href="?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>&amp;page=current_obj_advices">Voir les conseils</a></h6>
				<h6><a href="?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $datas['id'];?>&amp;action=delete&amp;page=current_obj">Supprimer</a></h6>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
		