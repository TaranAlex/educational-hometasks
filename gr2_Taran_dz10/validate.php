<?php
require('./request.php');

$request = new Request();
$errors = [];
if($request->isPost()) {
    $isValid = true;
    $request->required('email');
    $request->minMax('email', 3, 255);
    $request->required('password');
    $request->minMax('password', 3, 255);
    $request->validateEmail('email');

    $isValid = $request->isValid();
    $errors = $request->getErrors();


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

	$status = true;
	$email = $_POST['email'];
	$password = $_POST['password'];


	if($isValid) {
	$sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";
	$rows = $pdo->prepare($sql);
	$rows->execute(['email' => $email, 'password' => md5($password)]);


	$userData = $rows -> fetch();
		if($userData) {
			session_start();

			$id = $userData['id'];
			$email = $userData['email'];
			$fio = $userData['fio'];
			$role_id = $userData['role_id'];

			if(empty($_SESSION['id'])) {
				$_SESSION['id'] = $id;
			}

			if(empty($_SESSION['email'])) {
				$_SESSION['email'] = $email;
			}

			if(empty($_SESSION['fio'])) {
				$_SESSION['fio'] = $fio;
			}

			if(empty($_SESSION['role_id'])) {
				$_SESSION['role_id'] = $role_id;
			}

			$actualDate = date('Y-m-d H:i:s');
			$sql = "UPDATE users SET last_enter_date = :actualDate WHERE id = :id";
			$rows = $pdo->prepare($sql);
			$rows->execute(['actualDate' => $actualDate, 'id' => $id]);


			
		}
	}
}


echo json_encode(compact(['isValid'], ['userData'], ['errors']));die;
?>