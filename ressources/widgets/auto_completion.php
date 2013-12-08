<?php 
try
    {
        $bdd = new PDO('mysql:host=mysql51-105.perso;dbname=maximeplob', 'maximeplob', 'mA4NMM82E6RV');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

if(isset($_GET['term'])) {
    $term = htmlentities($_GET['term']); // protection
}

$array = array();

$request = $bdd->prepare('SELECT firstname, lastname, id FROM membres WHERE firstname LIKE :firstname OR lastname LIKE :lastname');
$request->execute(array(
	'firstname' => '%'.$term.'%',
    'lastname' => '%'.$term.'%',
	));
$donnees = $request->fetchAll();
foreach ($donnees as $value) {
	array_push($array, array(
		'label' => $value['firstname']." ".$value['lastname'],
		'id' => $value['id']));
}
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>