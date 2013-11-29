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

$request = $bdd->prepare('SELECT pseudo , id FROM membres WHERE pseudo LIKE :pseudo');
$request->execute(array(
	'pseudo' => '%'.$term.'%',
	));
$donnees = $request->fetchAll();
foreach ($donnees as $value) {
	array_push($array, array(
		'label' => $value['pseudo'],
		'id' => $value['id']));
}
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>