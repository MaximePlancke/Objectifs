<?php require $_SERVER['DOCUMENT_ROOT'].'/bbd_connexion.php'; 

if (($_SESSION['id'] != 0)) {        
    $request = $bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :nb_steps, NOW())');
    $request->execute(array(
        'id_mem' => $_SESSION['id'],
        'name_obj' => $_POST['name_obj'],
        'nb_steps' => $_POST['nb_steps'],
        ));
    $request->closeCursor();
    header('Location:/objective/new_objective.php');
}
?>