<?php

namespace classes;

use PDO;

require_once __DIR__ . '/../helper/checkSession.php';

class DataBase
{
    private string $hostname;
    private string $dbname;
    private string $username;
    private string $password;
    private int $port;

    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $this->hostname = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(): PDO
    {
        try {
            return new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);

        } catch (\PDOException $exception) {

            die($exception->getMessage());
        }
    }

    public function createUser(): void
    {
        $query = "INSERT INTO users (nickname, password, avatar) VALUES (:nickname, :password, :avatar)";
        $params = array(
            'nickname' => $_POST['nickname'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'avatar' => $_FILES['avatar']['size'] > 0 ? time() . "_" . $_FILES['avatar']['name'] : 'defaultAvatar.svg'
        );
        $statement = $this->connect()->prepare($query);

        try {
            $statement->execute($params);
            header('Location: /../../../index.php');
            die();

        } catch (\PDOException $exception) {

            die($exception->getMessage());
        }
    }

    public function getUser($nick, $pass): void
    {
        $statement = $this->connect()->prepare("SELECT * FROM `users` WHERE nickname = :nickname");

        $statement->execute(['nickname' => $nick]);

        $user = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if (!$user) {
            setMessage('error', 'Данного пользователя не существует');
            header('Location: /../../pages/index.php');
            die();
        }

        if (!password_verify($pass, $user[0]['password'])) {
            setMessage('error', 'Неверный пароль');
            header('Location: /../../../index.php');
            die();
        }

        $_SESSION['user']['id'] = $user[0]['id'];
        $_SESSION['user']['nickname'] = $user[0]['nickname'];
        $_SESSION['user']['avatar'] = $user[0]['avatar'];
        header('Location: /../../pages/personalArea.php');

    }

    public function uploadAvatar() : void
    {
        if (!is_dir('../../images')) {
            mkdir('../../images');
        }
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../../images/' . time() . "_" . $_FILES['avatar']['name']);
    }
}
