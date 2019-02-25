<?
$id = $_GET['id'] ?? '';

$carData = ['id'=> '', 'name_car' => '', 'name_city'=>'', 'year_birn'=>''];

if(!empty($id))
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/lesson12/models/cars.php';

    $carsClass = new Cars();
    $result = $carsClass->get_one(['id' => $id]);
    if($result){
        $carData = $result;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДОбавление авто</title>
</head>
<body>

<form action="/lesson12/controllers/save.php?operator=addcar" method="post">
    <p>
        <label for="">Название авто</label>
        <input type="text" name="name_car" >
    </p>
    <p>
        <label for="">Название города</label>
        <input type="text" name="name_city" >
    </p>
    <p>
        <label for="">Год выпуска</label>
        <input type="number" name="year_birn" >
    </p>
    <p>
        
        <button>Сохранить</button>
    </p>
</form>

</body>
</html>