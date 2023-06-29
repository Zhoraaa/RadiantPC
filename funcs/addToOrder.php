<?php
require "DBinteraction.php";
$id = $_GET['id'];

$query = "SELECT * FROM `Instances` WHERE `client` = '" . $_COOKIE['user'] . "' AND `product` = $id AND `status` = '1'";
$check = selectFrom($query, "ONE");
print_r($check);

function addToCart($id, $check, $result)
{
    if (empty($check)) {
        echo $query = "INSERT INTO `Instances`(`id`, `client`, `product`, `status`) VALUES (NULL,'" . $_COOKIE['user'] . "','$id','1')";
        insertOrUpdate($query);
        $result .= "Товар добавлен!";
    } else {
        $result .= "Такой заказ уже есть!";
    }
    return $result;
}

if (empty($check)) {
    $result = "Корзина пополнена! ";
    $_SESSION['result'] = addToCart($id, $check, $result);
} else {
    $_SESSION['result'] = "Вы уже претендуете на этот товар!";
}
header("location: ../product.php?id=$id");