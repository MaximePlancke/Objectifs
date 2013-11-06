<?php 

$page = isset($_GET['page']) ? $_GET['page'] : "home" ; 

if ($page == "home") {include ($_SERVER['DOCUMENT_ROOT']."/home.php");}	
if ($page == "log_in") {include ($_SERVER['DOCUMENT_ROOT']."/account/log_in.php");}
if ($page == "registration") {include ($_SERVER['DOCUMENT_ROOT']."/account/registration.php");}
if ($page == "new_objective") {include ($_SERVER['DOCUMENT_ROOT']."/objective/new_objective.php");}
if ($page == "current_obj") {include ($_SERVER['DOCUMENT_ROOT']."/user/current_obj.php");}
if ($page == "current_obj_advices") {include ($_SERVER['DOCUMENT_ROOT']."/user/current_obj_advices.php");}
if ($page == "add_advice") {include ($_SERVER['DOCUMENT_ROOT']."/user/add_advice.php");}
if ($page == "add_friends") {include ($_SERVER['DOCUMENT_ROOT']."/user/add_friends.php");}

?>