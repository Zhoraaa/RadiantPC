<?php
require("DBinteraction.php");

if (!empty($_POST)) {
    $product = $_POST['product'];
    $instance = $_POST['instance'];

    $query = "SELECT * FROM instances WHERE `product` = '$product' AND `instance` = '$instance'";
    $check = selectFrom($query, "ONE");

    if (empty($check)) {
        $query = "INSERT INTO `instances`(`id`, `product`, `instance`, `status`) VALUES (NULL,'$product','$instance','1')";
        insertOrUpdate($query);
        $_SESSION['result'] = "Экземпляр добавлен.";
    } else {
        $_SESSION['result'] = "Серийный номер не уникален.";
    }
}

header('location: /admin.php');