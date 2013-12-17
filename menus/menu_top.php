<?php 
	$id_member_session = isset($_SESSION['id']) ? $_SESSION['id'] : null;

	$user_menu = new User($bdd);
	$user_menu->setId($id_member_session);
	$user_name_session = $user_menu->read();

	$objective_menu = new Objective($bdd);
	$objective_menu->setIdMember($id_member_session);  
	$count_objective_menu = (int)($objective_menu->countDone());

	$friend_menu = new Friend($bdd);
	$friend_menu->setIdFriend2($id_member_session);
	$count_new_friend_menu = $friend_menu->alertNewFriendRequest();

	$advice_menu = new User($bdd);
	$advice_menu->setId($id_member_session);
	$count_new_advice_menu = $advice_menu->alertNewAdviceRequest();
?>
<div class="navbar navbar-fixed-top">
	<ul class="nav nav_top">
		<li>
			<div class="span1 img_menu_top">
				<a href="/">
					<img src="/ressources/images/home2.png">
				</a>
			</div>
		</li>
		<?php //Display menu when the user is online ?>
		<?php if ($id_member_session) : ?>
		<li>
			<div class="span1 text_menu_top">
				<a href="/user/profile/<?php echo $id_member_session?>"><?php echo htmlspecialchars(stripslashes($user_name_session['firstname'])); ?></a>
			</div>
			<div class="span2 text_menu_top">
				<div class=" form_inline" >
					<?php if ($count_new_friend_menu == 0) : ?>
						<a href="/account/friends/<?php echo $id_member_session?>"><img title="Amis" src="/ressources/images/friend_menu.png"/></a>
					<?php else : ?>
						<a href="/account/friends/<?php echo $id_member_session?>"><img title="Amis" src="/ressources/images/friend_menu_new.png"/></a>
					<?php endif ?>	
					<a href="/account/messages/<?php echo $id_member_session?>"><img title="Messages" src="/ressources/images/mail_menu.png"/></a>
					<?php if ($count_new_advice_menu == 0) : ?>
						<a href="/account/request/advices/<?php echo $id_member_session?>"><img title="Conseils" src="/ressources/images/advices_menu.png"/></a>
					<?php else : ?>
						<a href="/account/request/advices/<?php echo $id_member_session?>"><img title="Conseils" src="/ressources/images/advices_menu_new.png"/></a>
					<?php endif ?>	
				</div>
			</div>
		</li>
		<li>
			<div class="img_menu_top">
				<form method="post" class="form-search navbar-search">
					<input id="search_bar" name="search" type="text" placeholder="Rechercher" autocomplete="off"/>
				</form>	
			</div>
		</li>
		<li>
			<div id="progress" class="offset1 text_menu_top">
				<h6 class="form_inline">Objectifs Atteints</h6>
				<meter value="<?php echo $count_objective_menu;?>" min="0" max="100"></meter>
				<h6 class="form_inline"><?php echo $count_objective_menu;?>%</h6>
			</div>
		</li>
		<li>
			<div class="img_menu_top">
				<a class="logout_menu" href="/account/logout"><img src="/ressources/images/logout.png"></a>
			</div>
		</li>
		<?php else: ?>	
			<li>
				<div class="span2 text_menu_top">
					<a href='/account/login'>Connexion</a>
				</div>
				<div class="span2 text_menu_top">
					<a href='/account/registration'>Inscription</a>
				</div>
			</li>
		<?php endif ?>
	</ul>
</div>