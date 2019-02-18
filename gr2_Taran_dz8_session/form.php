<?php 
//Задание 5

session_start(); //стартуем сессию

    
    if (!empty($_SESSION['city'])) {
        $city = $_SESSION['city']; 
    }else{
        $city = '';
    }
    if (!empty($_SESSION['age'])) {
        $age = $_SESSION['age']; 
    }else{
        $age = '';
    }
 ?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="name">Enter your name
        <input type="text" name="age" value="<?php echo $age ?>">Enter your age
        <input type="text" name="city" value="<?php echo $city ?>">Enter your city
        <input type="submit">
    </form>