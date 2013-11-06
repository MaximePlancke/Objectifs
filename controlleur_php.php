<?php 

$page = isset($_GET['page']) ? $_GET['page'] : null ; 

if ($page == "log_in") {include ($_SERVER['DOCUMENT_ROOT']."/account/log_in_php.php");}
if ($page == "registration") {include ($_SERVER['DOCUMENT_ROOT']."/account/registration_php.php");}
if ($page == "log_out") {include ($_SERVER['DOCUMENT_ROOT']."/account/log_out.php");}
if ($page == "delete_account") {include ($_SERVER['DOCUMENT_ROOT']."/account/delete_account.php");}
if ($page == "new_objective") {include ($_SERVER['DOCUMENT_ROOT']."/objective/new_objective_php.php");}
if ($page == "current_obj") {include ($_SERVER['DOCUMENT_ROOT']."/user/current_obj_php.php");}
if ($page == "current_obj_advices") {include ($_SERVER['DOCUMENT_ROOT']."/user/current_obj_advices_php.php");}
if ($page == "add_advice") {include ($_SERVER['DOCUMENT_ROOT']."/user/add_advice_php.php");}
if ($page == "add_friends") {include ($_SERVER['DOCUMENT_ROOT']."/user/add_friends_php.php");}

?>