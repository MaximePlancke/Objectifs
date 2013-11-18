<?php foreach ($name_objective as $datas) { ?>
<h3><?php echo $datas['name_obj'];?></h3>
<?php } ?>
<div>
	<ul>
		<?php foreach ($advices as $datas): ?>
			<li>
				<h4><?php echo $datas['advice_content']; ?></h4>
				<h5>Ajouté par : <a href="/current/objective/<?php echo $datas['id']?>"><?php echo $datas['pseudo'];?></a> le <?php echo $datas['date_creation'];?></h5>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<a href="/current/objective/<?php echo $id_member?>">Revenir aux objectifs</a>