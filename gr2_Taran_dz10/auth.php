<?php

session_start();

$role_id = $_SESSION['role_id'];

if($role_id === 1){
	header('Location: ./users_list.php');
}

if($role_id === 2){
	header('Location: ./profile.php');
}


?>