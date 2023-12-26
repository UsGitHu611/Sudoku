<?php session_start(); ?>
<?php require_once  __DIR__ . "/../src/php/helper/checkSession.php"; ?>
<?php checkAuth(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal-Area</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <div class="inner">
        <div class="profile">

            <div class="img-mask">
                <img src="../src/images/<?= getImage()  ?>" alt="user-avatar">
            </div>

            <div class="info-user">
                <p class="nick"><?= $_SESSION['user']['nickname'] ?></p>
                <p class="descr" contenteditable="true">Enter your description</p>
            </div>
            <div class="btn-panel">
                <form action="../src/php/actions/logout.php" method="post">
                    <button>Exit</button>
                </form>
                <form action="../src/php/actions/complexity.php" method="post">
                    <button>Play</button>
                </form>
            </div>

    </div>

    <script src="../src/js/helperJS/rewrite-description.js"></script>
</body>
</html>
