<?php 
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site_objectifs', 'root', 'root');
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
		'label' => htmlspecialchars(stripslashes($value['firstname']." ".$value['lastname'])),
		'id' => $value['id'],
        'category' => "obj",
        ));
}

echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>