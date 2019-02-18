<?php
session_start();

require './Session.php';
$session = new Session;

$session->unset_('city');
$session->unset_('age');
$session->destroy();
header('Location: ./index.php');
exit;


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>