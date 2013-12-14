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

$request = $bdd->prepare('SELECT name_obj, id FROM objectifs WHERE name_obj LIKE :name_obj');
$request->execute(array(
	'name_obj' => '%'.$term.'%'
	));
$donnees = $request->fetchAll();
foreach ($donnees as $value) {
	array_push($array, array(
		'label' => $value['name_obj'],
		'id' => $value['id']
        ));
}
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>