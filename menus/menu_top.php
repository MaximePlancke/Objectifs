<?php 

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$objective = new Objective();
$objective->setIdMember($user_id);  
$objective->setDb($bdd);
$count = (int)($objective->countDone());
?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<ul class="nav nav_top">
			<li>
				<div class="span1">
					<a href="/">
						<img src="/ressources/images/home.png">
					</a>
				</div>
			</li>

			<?php //Display menu when the user is online ?>
			<?php if ($user_id) : ?>
			<li>
				<div class="span2 text_menu_top">
					<?php echo ($_SESSION['pseudo']); ?>
				</div>
				<div class="span4 img_menu_top">
					<form id="search" method="post" class="form-search navbar-search pull-left" action="/users">
						<input class="search_data search-query" name="search" type="text" placeholder="Rechercher" autocomplete="off"/>
					</form>	
				</div>
			</li>
			<li>
				<div id="progress" class="span4 text_menu_top">
					<span>Objectifs Atteints</span>
					<meter value="<?php echo $count;?>" min="0" max="100"></meter>
					<span><?php echo $count;?>%</span>
				</div>
			</li>
			<li>
				<div class="span1"><a href="/account/logout"><img class="img_menu_top" src="/ressources/images/logout.png"></a></div>
			</li>
			<?php else: ?>	
				<li>
					<div class="span2 text_menu_top">
						<a class="" href='/account/login'>Connexion</a>
					</div>
					<div class="span2 text_menu_top">
						<a class="" href='/account/registration'>Inscription</a>
					</div>
				</li>
			<?php endif ?>
		</ul>
	</div>
</div>