<?php 
session_set_cookie_params(3600);
session_start();

try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=site_objectifs', 'root', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>