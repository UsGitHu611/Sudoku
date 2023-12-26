<?php

use classes\DataBase;
use classes\Register;

session_start();
$_SESSION['validation'] = [];

require_once __DIR__ . '/../classes/DataBase.php';
require_once __DIR__ . '/../classes/Register.php';

$nickname = $_POST['nickname'];
$password = $_POST['password'];
$password_confirm = $_POST['confirmPassword'];
$config = include_once __DIR__ . '/../config.php';


$reg = new Register($nickname, $password, $password_confirm);
$db = new DataBase($config['DB_HOST'], $config['DB_NAME'], $config['DB_USERNAME'], $config['DB_PASSWORD']);

$reg->validate();
$db->connect();
$db->createUser();
$db->uploadAvatar();