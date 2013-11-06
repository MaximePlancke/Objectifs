<?php 

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<ul class="nav nav_top">
			<li>
				<div class="span1 img_menu_top">
					<a href="/index.php">
						<p><img src="/ressources/images/home.png"></p>
					</a>
				</div>
			</li>
			<li>
				<div class="span6 text_menu_top">
						<p>
							<?php				
								if ($user_id) {
								    echo ($_SESSION['pseudo']);
								} else {
									echo "<a href='/index.php?page=log_in'>Connexion</a>";
								}
							?>
						</p>
				</div>
			</li>
			<?php if (isset($user_id)): ?>
			<li>
				<div id="progress" class="offset1 span3 text_menu_top">
					<span>Objectifs Atteints</span>
					<meter value="00" min="0" max="100"></meter>
					<span>0%</span>
				</div>
			</li>
			<li>
				<div class="span1 img_menu_top"><a href="/index.php?page=log_out"><p><img src="/ressources/images/logout.png"></p></a></div>
			</li>
			<?php 	endif  ?>
		</ul>
	</div>
</div>