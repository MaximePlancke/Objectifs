<?php foreach ($name_objective as $datas) { ?>
<h3><?php echo $datas['name_obj'];?></h3>
<?php } ?>
<div>
	<ul>
		<?php foreach ($advices as $datas): ?>
			<li>
				<h4><?php echo $datas['advice_content']; ?></h4>
				<h5>Ajouté par : <a href="/index.php?id=<?php echo $datas['id'];?>&amp;page=current_obj"><?php echo $datas['pseudo'];?></a> le <?php echo $datas['date_creation'];?></h5>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<a href="/index.php?id=<?php echo $id_member;?>&amp;page=current_obj">Revenir aux objectifs</a>
