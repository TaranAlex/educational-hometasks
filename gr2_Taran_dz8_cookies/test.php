<?php
//СЕССИИ
//Задание 1
    session_start(); //стартуем сессию

    //Если есть данные в сессии об имени пользователя:
    if (!empty($_SESSION['name'])) {
        echo 'Users country: '. $_SESSION['name']; //выведем имя на экран
    }else{
        echo 'Country is not entered';
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>





<?php 
//Задание 3
    session_start(); //стартуем сессию

    
    if (!empty($_SESSION['email'])) {
        $email = $_SESSION['email']; 
    }else{
        $email = '';
    }
 ?>

<form action="" method="GET">
    <input type="text" name="name">Enter your name
    <input type="text" name="surname">Enter your surname
    <input type="text" name="password">Enter your password
    <input type="text" name="email" value="<?php echo $email ?>">Enter your email
    <input type="submit">
</form>








