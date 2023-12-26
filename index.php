<?php require_once __DIR__ . '/src/php/helper/checkSession.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <link rel="stylesheet" href="src/css/register.css">
</head>
<body>
    <div id="wrapper">

    <?php if (hasMessage('error')): ?>
        <p id="invalid-field">
            <?php echo showMessage('error') ?>
        </p>
    <?php endif; ?>

<form id="register" action="src/php/actions/log.php" method="post">

    <label for="nick">Никнейм</label>
    <input
            id="nick"
            name="nickname"
            type="text"
            placeholder=""
            aria-label="nickName"
    >

    <label for="pass">Пароль</label>
    <input
            id="pass"
            name="password"
            type="password"
            placeholder=""
            aria-label="password"
    >

    <button class="form-btn" type="submit">Войти</button>
</form>
    <p class="question">Еще нет аккаунта? <a href="pages/register.php">Регистрация</a></p>
        </div>

<script src="src/js/animation.js"></script>
</body>
</html>
