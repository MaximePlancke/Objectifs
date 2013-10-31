<?php require '../connexion/bbd_connexion.php'; 

if (($_SESSION['id'] != 0)) {        
    $ajout_obj = $bdd->prepare('INSERT INTO objectifs(id_membres, name_obj, nb_steps, date_creation) VALUES(:id_mem, :name_obj, :nb_steps, NOW())');
    $ajout_obj->execute(array(
        'id_mem' => $_SESSION['id'],
        'name_obj' => $_POST['name_obj'],
        'nb_steps' => $_POST['nb_steps'],
        ));
    header('Location:/objectifs/new_obj.php');
}
?>