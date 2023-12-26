<?php require_once __DIR__ . '/../src/php/helper/checkSession.php' ?>

<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../src/css/register.css">
</head>
<body>
    <div id="wrapper">
        <form id="register" action="../src/php/actions/reg.php" method="post" enctype="multipart/form-data">

    <label for="nick">Никнейм</label>
    <input
            id="nick"
            name="nickname"
            type="text"
            placeholder=""
            aria-label="nickName"
    >
            <?php echo getErrorMessage("nickname") ?>

    <label for="pass">Пароль</label>
    <input
            id="pass"
            name="password"
            type="password"
            placeholder=""
            aria-label="password"
    >
            <?php echo getErrorMessage("password") ?>

    <label for="repPass">Еще разок</label>
    <input
            id="repPass"
            name="confirmPassword"
            type="password"
            placeholder=""
            aria-label="repeatPassword"
    >
            <?php echo getErrorMessage("confirm") ?>

    <label for="ava">Аватарка</label>
    <button class="file-btn">
        <input
            id="ava"
            type="file"
            name="avatar"
            aria-label="avatar"
        >
        <p>Загрузить фото</p>
    </button>


    <button class="form-btn" type="submit">Регистрация</button>
</form>
    <p class="question">Уже есть аккаунт? <a href="../index.php">Войти</a></p>
    </div>

            <?php session_destroy() ?>
<script src="../src/js/animation.js"></script>
</body>
</html>