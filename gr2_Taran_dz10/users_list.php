<?php 


	$host = 'localhost';
	$db = 'joins';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES => false,
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);

	

	$userData = $rows -> fetch();
	$fio = $userData['fio'];
	

	$sql = "SELECT fio FROM users";
	$rows = $pdo->prepare($sql);
	$rows->execute(['fio' => $fio]);

	echo $fio;



session_start();



$role_id = $_SESSION['role_id'];
if($role_id !== 1){
	header('Location: ./profile.php');
	
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



<!DOCTYPE html>
<html>
<head>
 
 <meta charset="UTF-8">
 <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

</head>
<body>
	<h1>Content for admin only, not for users</h1>

	
		<?php
		while ($userData = $rows -> fetch()) {?>
		  <div><?php echo $fio ?></div>
		<?php }
		?>



	<form action="" method="GET">
	    <input type="submit" name="exit" value="exit">
	</form>
</body>