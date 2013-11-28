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
				<li class="box_content">
					<h4>
						<?php echo $datas['name_obj']; ?>
						<?php if ($id_member == $_SESSION['id']) : ?>
							<a href="/done/objective/<?php echo $id_member;?>/<?php echo $datas['id'];?>/obj_modif"><img title="Déplacer vers Objectifs en cours" src="/ressources/images/obj_modif.png"></a>
							<a href="/done/objective/<?php echo $id_member;?>/<?php echo $datas['id'];?>/delete"><img title="Supprimer" src="/ressources/images/obj_delete.png"></a>
						<?php endif ?>
					</h4>
					<h5>Nombre d'étapes: <?php echo $datas['nb_steps']; ?></h5>
					<div class="hidden_part">
						<a href="/current/advices/<?php echo $id_member;?>/<?php echo $datas['id'];?>">Voir les conseils</a>
					</div> 
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>	