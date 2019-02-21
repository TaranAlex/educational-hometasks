<?php 


session_start();

$role_id = $_SESSION['role_id'];
if($role_id === 1){
	header('Location: ./users_list.php');
	
}
if($_SERVER['REQUEST_METHOD'] === "GET"){
        if(isset($_GET['exit']) && $_GET['exit'] === 'exit'){
            unset($_SESSION['role_id']);
            session_destroy();
            header('Location: ./index.php');
        exit;
        }
    }


?>

<h1>Content for users only, not for admin</h1>

<form action="" method="GET">
    <input type="submit" name="exit" value="exit">
</form>