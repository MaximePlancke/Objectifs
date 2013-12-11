<?php 
require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php';

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$errors  = array();
$success = array();
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

require($_SERVER['DOCUMENT_ROOT'].'/routing.php');

$URi   = $_SERVER["REQUEST_URI"]; 
$motif = "'/index\.php'"; 
if (preg_match($motif,$URi)) { 
	header("Status: 301 Moved Permanently"); 
	header("Location: /"); 
	exit; 
} 
?>

<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>ObjectiveShare</title>
	<?php //Open the window to the screen size?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/ressources/style.css">
	<?php //Integration CSS Bootstrap, Font-Awesome and Polices ?>
	<link href="/ressources/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
	<link href="/ressources/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
	<?php //include my PHP fonctions ?>
	<?php include($_SERVER['DOCUMENT_ROOT']."/ressources/my_php_fonctions.php"); ?>

</head>
  <body>
	<div id="container-fluid">
		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>
	<section id="main_page" class="row-fluid">
		<?php if ($user_id): ?>
			<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>
		<?php endif ?>
		<div id="page_right">
 			<?php  include($template); ?>
		</div>
	</section>
	<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>
	</div>
	<!-- jQuery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/ressources/javascript.js"></script>
	<script type="text/javascript" src="/ressources/jQuery/obshare_script2.js"></script>
  </body>
</html>