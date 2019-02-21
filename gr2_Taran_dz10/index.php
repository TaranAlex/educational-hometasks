<?php
require('./request.php');

$request = new Request();
$errors = [];

if($request->isPost()) {
    $isValid = true;
    $request->required('email');
    $request->minMax('email', 3, 255);
    $request->required('password');
    $request->minMax('password', 5, 255);
    $request->validateEmail('email');

    $isValid = $request->isValid();
    $errors = $request->getErrors();
}

?>
<link rel="stylesheet" href="auth.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<br>
<div class="container">
    <div class="row">

        <form style="width: 100%" method="POST" id="id-form">
            <div class="form-group row">
                <label for="email1" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control <?=($errors['email'] ? 'is-invalid' : '' ); ?>"
                            id="email1"
                            name="email"
                            value="<?=(isset($email) ? $email : '' );  ?>"
                    >
                    <div class="invalid-feedback">
                        <?=($errors['email'] ? $errors['email'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input
                            type="password"
                            class="form-control <?=($errors['password'] ? 'is-invalid' : '' ); ?>"
                            id="password"
                            name="password"
                            value="<?=(isset($password) ? $password : '' );  ?>"
                    >
                    <div class="invalid-feedback">
                        <?=($errors['password'] ? $errors['password'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <?php if(isset($isValid) && $isValid): ?>
                        <div class="alert alert-success">Форма валидна</div>
                    <?php endif; ?>
                </div>
            </div>

        </form>
    </div>
</div>
<script>
    $(function() {
        $("#id-form").submit(function(e) {
            var form = $(this);
            $.ajax({
                type: "POST",
                url: './validate.php',
                data: form.serialize(),
                dataType: 'json',
                success: function(data)
                {
                    console.log(data);
                    if(data.userData) {
                        document.location.href = './auth.php';
                    }else{
                        alert('Неверный логин/пароль')
                    }
                }
            });
            e.preventDefault();
        });
    });
    /*$(function() {
            $("#id-form").submit(function(e) {
                var form = $(this);
                
                $.ajax({
                    type: "POST",
                    url: './users_list.php',
                    data: form.serialize(),
          
                    success: function(data)
                    {
                        $('.fio').html(data);
                    }
                });
                e.preventDefault();
            });
         });*/
</script>
</body>
</html>