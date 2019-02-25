<?
include_once $_SERVER['DOCUMENT_ROOT'].'/lesson12/models/cars.php';



$carsClass = new Cars();
$cars = $carsClass->get_all();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h1>Список авто</h1>

<?php foreach ($cars as $car):?>
<p><?php echo $car['name_car']?></p><a href='edit_cars.php?id=<?php echo $car['id']; ?>'>edit</a>
<?php endforeach;?>
</body>
</html>