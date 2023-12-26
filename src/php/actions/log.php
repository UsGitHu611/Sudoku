<?php

use classes\DataBase;

require_once __DIR__ . '/../classes/DataBase.php';

$nickname = $_POST['nickname'];
$password = $_POST['password'];
$config = include_once __DIR__ . '/../config.php';

$db = new DataBase($config['DB_HOST'], $config['DB_NAME'], $config['DB_USERNAME'], $config['DB_PASSWORD']);

$db->connect();
$db->getUser($nickname, $password);
