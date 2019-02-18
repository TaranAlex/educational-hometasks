<?php 
//Cookies
//Задание 1


// Проверяем, был ли уже установлен Cookie 'counter',
// Если да, то читаем его значение,
// И увеличиваем значение счетчика обращений к странице:
if (isset($_COOKIE['counter'])) $counter=$_COOKIE['counter']+1;
else $counter=0;
// Устанавливаем Cookie 'counter' зо значением счетчика,
// С временем "жизни" 10 лет,
setcookie('counter',$counter,time()+60*60*24*365*10);
// Выводит число посещений (загрузок) этой страницы:
echo "<p>Вы посещали эту страницу <b>".$counter."</b> раз</p>";
?>




<?php 
//Задание 2

$button = false;
if (isset($_COOKIE['button'])) $button = true;
else $button = false;

setcookie('button', $_REQUEST['button'], time()+60*60*24*30, '/');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <?php if($button == false): ?>
            <a href="">Banner</a>
        <?php endif; ?>
        <form action="" method="GET">
            <input type="submit" name="button" value="DO NOT SHOW">
        </form>
        
    </body>







<?php 
//Задание 3
if (!isset($_COOKIE['time'])){
    $_COOKIE['time'] = time();
} 

setcookie('time', $_COOKIE['time']);

echo 'Вы не посещали сайт '.round((time() - ($_COOKIE['time']))/60/60/24). ' дней';
?>







<?php 
//Задание 4


if (!empty($_REQUEST['birthday'])) {
        //Пишем имя в куки:
        setcookie('birthday', $_REQUEST['birthday'], time()+60*60*24*365, '/');
    
       $birthday = strtotime($_REQUEST['birthday']); 
       $howMuchYear = (time() - $birthday)/60/60/24/365;       
       $howMuchYear1 = ceil(((time() - $birthday)/60/60/24/365));       
       $howMuchBeforeBirthday = ceil(($howMuchYear1 - $howMuchYear)*365);            
            if($howMuchBeforeBirthday !== 365){
                echo 'До вашего дня рождения осталось '.$howMuchBeforeBirthday. ' дней';
            }else echo 'Happy birthday!!!';
}
 
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="GET">
        <input type="text" name="birthday" placeholder="YYYY-MM-DD">Ведите дату рождения
        <input type="submit" name="" value="Отправить">
    </form>
    
</body>








<?php 
//Задание 5

//Если форма была отправлена и имя не пустое:
    if (isset($_COOKIE['color'])) $color = $_COOKIE['color'];
    else $color = 'Red';

    setcookie('color', $_REQUEST['color'], time()+60*60*24*365, '/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
        .red{
            background: red;
        }
        .green{
            background: green;
        }
        .blue{
            background: blue;
        }
    </style>
</head>
    <body>
        <?php if($color === 'Red'): ?>
            <header class="red" style="width:300px; height: 100px"></header>
        <?php endif; ?>
        <?php if($color === 'Green'): ?>
            <header class="green" style="width:300px; height: 100px"></header>
        <?php endif; ?>
        <?php if($color === 'Blue'): ?>
            <header class="blue" style="width:300px; height: 100px"></header>
        <?php endif; ?>
        <form action="" method="GET">
            <select name="color">
              <option>Red</option>
              <option>Green</option>
              <option>Blue</option>
            </select>
            <input type="submit" name="" value="save">
        </form>
        
    </body>



















































 











