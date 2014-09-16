<div id="page_right_padding">
<?php if ($id_member == $user_id) : ?>
	<ul>
		<?php foreach ($errors as $value): ?> 
			<li>
				<?php echo $value; ?>
			</li>
		<?php endforeach ?>
		<?php foreach ($success as $value): ?> 
			<li>
				<?php echo $value; ?>
			</li>
		<?php endforeach ?>
	</ul>
	<h4>Conseils en attente</h4>
		<div class="box_content_advices">
			<ul>
				<?php foreach ($list_advices_request as $value): ?>
					<li class="box_advice">
						<img src="/ressources/images/advice_obj.png">
						<?php echo UrlToShortLink(htmlspecialchars(stripslashes($value['advice_content']))); ?>
						<div class="form_inline form_modif_advices form_modif_advices_<?php echo $value['id'];?>">
							<img class="accept_advice_request" title="Accepter" value="accept_advice" src="/ressources/images/obj_done.png"/>
							<img class="delete_advice_request" title="Supprimer" value="delete_advice" src="/ressources/images/obj_delete.png"/>
							<div class="id_advice" type="hidden" value="<?php echo $value['id'];?>"></div>
							<div class="id_member" type="hidden" value="<?php echo $id_member;?>"></div>
							<div class="id_member_give_advice" type="hidden" value="<?php echo $value['id_member_give_advice'] ?>"></div>
						</div>
						<h6>Pour l'objectif : <?php echo htmlspecialchars(stripslashes($value['name_obj']));?></h6>
						<h6>Ajouté par : <a href="/user/profile/<?php echo $value['id_member_give_advice']?>"><?php echo htmlspecialchars(stripslashes($value['firstname']." ".$value['lastname']));?></a> le <?php echo $value['date_creation'];?></h6>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<h4>Notifications</h4>
		<ul>
			<?php foreach ($list_notifications_objective as $value): ?>
				<?php if ($value['seen'] == 0): ?>
					<li class="box_notifications_new">
						<div class="id_notification" type="hidden" value="<?php echo $value['id']; ?>"></div>
						<img class="form_inline" src="/ressources/images/obj_done.png">
						<h6 class="form_inline" >L'objectif : <a href="/objective/<?php echo $value['id_obj']; ?>"><?php echo htmlspecialchars(stripslashes($value['name_obj']));?></a> a été placé dans la section "Objectifs terminés"</h6>
						<h6 class="grey_text"><?php echo htmlspecialchars(stripslashes($value['date_creation'])); ?></h6>
					</li>			
				<?php else : ?>
					<li class="box_notifications">
						<img class="form_inline" src="/ressources/images/obj_done.png">
						<h6 class="form_inline" >L'objectif : <a href="/objective/<?php echo $value['id_obj']; ?>"><?php echo htmlspecialchars(stripslashes($value['name_obj']));?></a> a été placé dans la section "Objectifs terminés"</h6>
						<h6 class="grey_text"><i><?php echo htmlspecialchars(stripslashes($value['date_creation'])); ?></i></h6>
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	<?php else : ?>
		<h4>Vous n'avez pas les droits</h4>
		<?php exit(); ?>
	<?php endif ?>
</div>