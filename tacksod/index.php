<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 13.11.2018
 * Time: 15:43
 */

include "controller.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Тестовое</title>
</head>
<body>
<div class="container">

<?php if(isset($_SESSION['userType'])):?>
<h3> Вы авторизованы как админ</h3>
    <a href="?action=logout">Разавторизоваться</a>
<?php else:?>
<nav><a href="login.php">Авторизоваться</a></nav>
<?php endif;?>


    <h2>Оставьте свой отзыв</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group"> <input type="text" name="name" class="form-control" maxlength="50"></div>
        <div class="form-group"><input type="email" name="email" class="form-control"></div>
        <div class="form-group"><textarea name="text" id="" cols="30" rows="10" class="form-control" maxlength="200"></textarea></div>
        <div class="form-group"> <input type="file" name="image" class="form-control-file" accept="image/jpeg,image/png, image/gif"></div>
        <div class="form-group"> <button type="submit" class="btn btn-primary">Отправить</button></div>
    </form>
    <h2>Список отзывов</h2>
    <h4>Сортировать по:</h4>
    <p>
        <a href="?sort=authorName" class="btn btn-secondary">имени автора</a>
        <a href="?sort=authorEmail" class="btn btn-info">email автора</a>
        <a href="?sort=authorDate" class="btn btn-dark">дате</a>
    </p>
    <table class="table table-striped">
        <?php foreach ($data as $review):?>
        <tr>
            <td><img src="img/<?=$review['img']?>"></td>
            <td><?=$review['name']?></td>
            <td><?=$review['date']?></td>
            <td><?=$review['email']?></td>
            <td><?=$review['text']?></td>
            <?php if(isset($_SESSION['userType'])):?>
            <td><a href="?action=delete&id=<?=$review['id']?>" class="btn btn-danger">Удалить</></td>
            <?php endif;?>
        </tr>
        <?php endforeach;?>
    </table>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
