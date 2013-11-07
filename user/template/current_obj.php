<h3>Objectifs en cours</h3>
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
				<h6><a href="add_advice-<?php echo $id_member;?>-<?php echo $datas['id'];?>.html">Donner un conseil</a></h6>
				<h6><a href="current_obj_advices-<?php echo $id_member;?>-<?php echo $datas['id'];?>.html">Voir les conseils</a></h6>
				<h6><a href="current_obj-<?php echo $id_member;?>-<?php echo $datas['id'];?>-delete.html">Supprimer</a></h6>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
		