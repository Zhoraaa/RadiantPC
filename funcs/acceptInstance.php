<?php
require("user.php");
require("DBinteraction.php");

if (isset($_GET['id'])) {
    $query = "UPDATE `Instances` SET `status` = '2' WHERE id =" . $_GET['id'];
    $res = insertOrUpdate($query);
    if ($res) {
        $_SESSION['result'] = "Заказ одобрен!";
    } else {
        $_SESSION['result'] = "Произошла неизвестная ошибка.";
    }
} else {
    $_SESSION['result'] = "Что одобряем то?";
}
header("location: ../admin.php");