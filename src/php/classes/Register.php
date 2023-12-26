<?php

namespace classes;
session_start();


class Register
{

    private string $nick;
    private string $pass;
    private string $conf;

    public function __construct(string $nickname, string $password, string $confirm)
    {
        $this->nick = trim($nickname);
        $this->pass = trim($password);
        $this->conf = trim($confirm);
    }

    public function getFormData(): array
    {
        return [
            "nickname" => $this->nick,
            "password" => $this->pass,
            "confirm" => $this->conf
        ];
    }

    public function validate(): void
    {
        $pattern = '/^[a-zA-Z0-9_\-@*]{5,30}$/';
        foreach ($this->getFormData() as $field => $prop) {
            if (!preg_match($pattern, $prop)) {
                $_SESSION['validation'][$field] = "Недопустимые символы";
            }
        }

        if ($this->pass !== $this->conf) {
            $_SESSION['validation']['confirm'] = "Пароли не совпадают";
        }

        if (!empty($_SESSION['validation'])) {
            header('Location: /../../pages/register.php');
            die();
        }

    }


}






