<?php 
//СЕССИИ
//Задание 1

    //Если форма была отправлена и имя не пустое:
    if (!empty($_REQUEST['name'])) {
        session_start(); //стартуем сессию
        $_SESSION['name'] = $_REQUEST['name']; //пишем в сессию
    }
?>
<form action="" method="GET">
    <input type="text" name="name">Enter your country
    <input type="submit">
</form>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>





<?php 
//Задание 2

session_start();

if (!isset($_SESSION['time'])){
    $_SESSION['time'] = time();
} 

echo 'Вы зашли на сайт '.(time() - ($_SESSION['time'])). ' секунд назад';
?>







<?php 
//Задание 3
//Если форма была отправлена и имя не пустое:
    if (!empty($_REQUEST['email'])) {
        session_start(); //стартуем сессию
        $_SESSION['email'] = $_REQUEST['email']; //пишем в сессию
    }
?>

<form action="" method="GET">
    <input type="text" name="email">Enter your email
    <input type="submit">
</form>







<?php 
//Задание 4

session_start(); 

if (!isset($_SESSION['counter'])){
    $_SESSION['counter'] = 1;
    echo "Вы еще не обновляли эту страницу";
    }else {
        $counter = $_SESSION['counter']++;
        echo "Вы обновили эту страницу ".$counter." раз. ";
    }
 
?>





<?php 
//Задание 5

//Если форма была отправлена и имя не пустое:
    if (!empty($_REQUEST['city'])) {
        session_start(); //стартуем сессию
        $_SESSION['city'] = $_REQUEST['city']; //пишем в сессию
    }
    if (!empty($_REQUEST['age'])) {
        session_start(); //стартуем сессию
        $_SESSION['age'] = $_REQUEST['age']; //пишем в сессию
    }
?>
<form action="" method="GET">
    <input type="text" name="city">Enter your city
    <input type="text" name="age">Enter your age
    <input type="submit">
</form>




























 




