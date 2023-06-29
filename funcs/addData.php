<?php
require("DBinteraction.php");

if (isset($_GET['data'])) {
    if (isset($_GET['name'])) {
        $query = "SELECT * FROM `" . $_GET['data'] . "` WHERE `name` = '" . $_GET['name'] . "'";
        $check = selectFrom($query, "ONE");

        if (empty($check)) {
            $query = "INSERT INTO `" . $_GET['data'] . "` (`id`, `name`) VALUES (NULL, '" . $_GET['name'] . "')";
            insertOrUpdate($query);
            $_SESSION['result'] = "Данные добавлены!";
        } else {
            $_SESSION['result'] = "А что вписывать?";
        }
    } else {
        $_SESSION['result'] = "А куда вписывать?";
    }
} else {
    $_SESSION['result'] = "Данные в базе не уникальны!";
}
header('location: /admin.php?tool=categories');
