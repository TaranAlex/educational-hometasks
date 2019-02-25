<?php


if(isset($_GET['operator'])){

    //добавление города
    if($_GET['operator'] == 'addcity'){
        include_once $_SERVER['DOCUMENT_ROOT'].'./lesson12/models/cities.php';

        $cityClass = new Cities();

        if(!empty($_POST['id'])){
            $result = $cityClass->update($_POST);
        }else{
            unset($_POST['id']);
            $result = $cityClass->insert($_POST);
        }

        if($result){
            //echo 'данные сохранены!';
            header('Location: /lesson12/list_cities.php');
        exit;
        }
    }


    if($_GET['operator'] == 'addcar'){
        include_once $_SERVER['DOCUMENT_ROOT'].'./lesson12/models/cars.php';

        $carClass = new Cars();

        if(!empty($_POST['id'])){
            $result = $carClass->update($_POST);
        }else{
            unset($_POST['id']);
            $result = $carClass->insert($_POST);
        }

        if($result){
            //echo 'данные сохранены!';
            header('Location: /lesson12/list_cars.php');
        exit;
        }
    }

}

?>