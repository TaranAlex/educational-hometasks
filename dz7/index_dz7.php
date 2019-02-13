<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>

<br>
<div class="container">
    <div class="row">

        <form id="id-form" style="width: 100%" method="post">
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control <?php echo ($errors['title'] ? 'is-invalid' : '' ); ?>"
                            id="title"
                            name="title"
                            value="<?php echo (isset($title) ? $title : '' );  ?>"
                    >
                    <div class="invalid-feedback"><?php echo ($errors['title'] ? $errors['title'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннотация</label>
                <div class="col-md-10">
                    <textarea
                            name="annotation"
                            id="annotation"
                            class="form-control <?php echo ($errors['annotation'] ? 'is-invalid' : '' ); ?>"
                            cols="30"
                            rows="10"
                            <?php echo (isset($annotation) ? $annotation : '' );  ?>></textarea>
                    <div class="invalid-feedback"><?php echo ($errors['annotation'] ? $errors['annotation'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                            name="content"
                            id="content"
                            class="form-control <?php echo ($errors['content'] ? 'is-invalid' : '' ); ?>"
                            cols="30"
                            rows="10"
                            <?php echo (isset($content) ? $content : '' );  ?>></textarea>
                    <div class="invalid-feedback"><?php echo ($errors['content'] ? $errors['content'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                <div class="col-md-10">
                    <input
                            type="email"
                            class="form-control <?php echo ($errors['email'] ? 'is-invalid' : '' ); ?>"
                            id="email"
                            name="email"
                            value="<?php echo (isset($email) ? $email : '' );  ?>"
                    >
                    <div class="invalid-feedback"><?php echo ($errors['email'] ? $errors['email'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control <?php echo ($errors['views'] ? 'is-invalid' : '' ); ?>"
                            id="views"
                            name="views"
                            value="<?php echo (isset($views) ? $views : '' );  ?>"
                    >
                    <div class="invalid-feedback"><?php echo ($errors['views'] ? $errors['views'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control <?php echo ($errors['date'] ? 'is-invalid' : '' ); ?>"
                            id="date"
                            name="date"
                            value="<?php echo (isset($date) ? $date : '' );  ?>"
                    >
                    <div class="invalid-feedback"><?php echo ($errors['date'] ? $errors['date'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <input
                            type="checkbox"
                            class="form-control <?php echo ($errors['is_publish'] ? 'is-invalid' : '' ); ?>"
                            id="is_publish"
                            name="is_publish"
                            <?php echo (isset($is_publish) ? $is_publish : '' );  ?>
                    >
                    <div class="invalid-feedback"><?php echo ($errors['is_publish'] ? $errors['is_publish'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Публиковать на главной</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                        <label class="form-check-label" for="publish_in_index_yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                        <label class="form-check-label" for="publish_in_index_no">
                            Нет
                        </label>
                    </div>
                    <div class="invalid-feedback"><?php echo ($errors['title'] ? $errors['title'][0] : '' ); ?></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Категории</label>
                <div class="col-md-10">
                    <select id="category" class="form-control <?php echo ($errors['category'] ? 'is-invalid' : '' ); ?>" name="category">
                        <option disabled selected>Выберете категорию из списка..</option>
                        <option value="1">Спорт</option>
                        <option value="2">Культура</option>
                        <option value="3">Политика</option>
                        <?php echo (isset($category) ? $category : '' );  ?>
                    </select>
                    <div class="invalid-feedback"><?php echo ($errors['category'] ? $errors['category'][0] : '' ); ?></div>
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
</body>
</html>

<script>
    $(function() {
        $("#id-form").submit(function(e) {
            var form = $(this);
            
            $.ajax({
                type: "POST",
                url: '/dz7/form_dz.php',
                data: form.serialize(),
                dataType: 'json',
                success: function(data)
                {
                    console.log(data);
                    alert(data.status);
                }
            });
        e.preventDefault();
        });
            
    });
</script>










