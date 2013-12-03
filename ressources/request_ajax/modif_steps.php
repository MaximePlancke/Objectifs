<?php 
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site_objectifs', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

function loadClass($class) {
  require $_SERVER['DOCUMENT_ROOT'].'/class/' . $class . '.class.php';
}
spl_autoload_register('loadClass');

$id_step = isset($_POST['id']) ? $_POST['id'] : null;
$done = isset($_POST['done']) ? $_POST['done'] : null;

$steps_objective = new StepsObjective();
$steps_objective->setDb($bdd);
$steps_objective->setId($id_step);
$steps_objective->updateStatus($done);
?>