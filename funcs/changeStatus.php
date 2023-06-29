<?php
require("./DBinteraction.php");

if (!empty($_POST['instance']) ?? !empty($_POST['status'])) {
    $instance = $_POST['instance'];
    $status = $_POST['status'];

    $query = "UPDATE `instances` SET `status`='$status' WHERE `instances`.`id` = '$instance'";
    insertOrUpdate($query);

    $_SESSION['result'] = "Статус изменён.";
} else {
    $_SESSION['result'] = "Ошибка.";
}
header('location: /admin.php');