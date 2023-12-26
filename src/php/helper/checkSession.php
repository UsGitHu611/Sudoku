<?php
    session_start();

    function getErrorMessage(string $field) : string
    {
        return isset($_SESSION['validation'][$field]) ? "<small id='invalid-field'>Не верный $field или пароли не совпадают</small>" : "";
    }

    function setMessage(string $key, string $value) : void
    {
        $_SESSION['message'][$key] = $value;
    }

    function hasMessage(string $key) : bool
    {
        return isset($_SESSION['message'][$key]);
    }

    function showMessage(string $key) : string
    {
        $message = $_SESSION['message'][$key] ?? "";
        unset($_SESSION['message'][$key]);
        return $message;
    }

    function checkAuth() : void
    {
        if (!isset($_SESSION['user']['id']) )
        {
            header("Location: /");
        }
    }

    function getImage() : string
    {
        $avatar = $_SESSION['user']['avatar'];
        return $avatar;
    }

    function logout(): void
    {
        unset($_SESSION['user']['id']);
        header('Location: /');
    }
