<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

$id_member = isset($_GET['id']) ? $_GET['id'] : null;
$id_member_give_advice = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$id_objective = isset($_GET['id_objective']) ? $_GET['id_objective'] : null;
$advice_content = isset($_POST['name_advice']) ? $_POST['name_advice'] : null;
$errors = array();

if ($id_member_give_advice AND $id_objective AND $advice_content) {
	$request = $bdd->prepare('INSERT INTO advices(id_member_give_advice, id_objective, advice_content, date_creation) VALUES(:id_member_give_advice, :id_objective, :advice_content, NOW())');
	$request->execute(array(
		'id_member_give_advice' => $id_member_give_advice,
		'id_objective' => $id_objective,
		'advice_content' => $advice_content
		));
	$request->closeCursor();
	array_push($errors, "Votre conseil a bien été ajouté");
}
?>

<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="UTF-8">
	    <title>Motivation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="/ressources/style.css">
		<link rel="stylesheet" href="/ressources/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/ressources/bootstrap/css/bootstrap.css" media="screen"> 
		<link rel="stylesheet" href="/ressources/bootstrap/css/bootstrap-responsive.min.css" type="text/css">
	</head>
  	<body>
	<div id="container-fluid">

		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_top.php"); ?>

		<section id="main_page" class="row-fluid">

			<?php include($_SERVER['DOCUMENT_ROOT']."/menus/menu_left.php"); ?>

			<div id="page_right">
				<h3>Ajouter un conseil</h3>
				<form method="post" class="well form-inline" action="/user/add_advice.php?id=<?php echo $id_member;?>&amp;id_objective=<?php echo $id_objective;?>">
						<ul>
							<?php foreach ($errors as $value): ?>
								<li>
									<h5><?php echo $value; ?></h5>
								</li>
							<?php endforeach ?>
						</ul>
					<p><label for="name_advice"/>Votre Conseil</label><br/>
					<textarea id="name_advice" name="name_advice" rows=4 class="span5" required autofocus></textarea>
					<br/><br/>
		       		<input type="submit" value="Valider le conseil" class="btn btn-primary"/></p>
       			</form>
       			<a href="/user/current_obj.php?id=<?php echo $id_member;?>">Revenir aux objectifs</a>
			</div>
		</section>

		<?php include($_SERVER['DOCUMENT_ROOT']."/menus/footer.php"); ?>

	</div>
	<script src="/ressources/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>