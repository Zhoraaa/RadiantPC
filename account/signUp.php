<?php
require("../funcs/connect.php");
require("../funcs/session.php");

// Подключение БД и сессии
require_once("../funcs/DBinteraction.php");
$_SESSION['result'] = "Регистрация не была завершена по неизвестной ошибке";

// Запись в переменные для последующего SQL-запроса
$login = $_GET['login'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$patronymic = (!empty($_GET['patronymic'])) ? "'" . $_GET['patronymic'] . "'" : "NULL";
$pass = ($_GET['password'] == $_GET['password_repeat']) ? $_GET['password'] : false;

// Защита от дурака, отключившего JS
if (!$login || mb_strlen($login) < 6 || mb_strlen($login) > 32) {
    $_SESSION['result'] = "Введите корректный логин (от 6 до 32 символов, латиница и цифры)";
} elseif (!$pass || mb_strlen($pass) < 6 || mb_strlen($pass) > 32) {
    $_SESSION['result'] = "Пароли корректный пароль (от 6 до 32 символов, латиница и цифры)";
} else {
    // Проверка логина, почты и телефона на уникальность
    $res = $con->query("SELECT * FROM users WHERE `login`='$login'");
    $checkLogin = mysqli_fetch_assoc($res);

    if ($checkLogin) {
        $_SESSION['result'] = "Логин уже используется";
    } else {
        // Добавление пользователя.
        $pass = md5($pass);

        $query = "INSERT INTO `users`
        (`id`, `login`, `name`, `surname`, `patronymic`, `password`) 
        VALUES 
        (NULL,'$login','$name','$surname',$patronymic,'$pass')";
        $res = insertOrUpdate($query);

        // Автоматический вход в аккаунт после регистрации
        include "signIn.php";

        $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $account['name'] . "!";
    }
}
header("location: /");
