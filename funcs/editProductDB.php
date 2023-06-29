<?php
require("connect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$cost = $_POST['cost'];
$company = $_POST['company'];
$type = $_POST['type'];
$createDate = date("Y-m-d", strtotime($_POST['createDate']));

$query = "SELECT `image` FROM `products` WHERE `id` = $id";
$res = $con->query($query);
$product = $res->fetch_assoc();
$oldImg = $product['image'];
$img = "`image` = '$oldImg'";
if (!empty($_FILES['image'])) {
    $check = explode(".", $_FILES['image']['name']);
    switch (end($check)) {
        default:
            $_SESSION['result'] = "Принимаются только файлы png, jpg и jpeg";
            break;
        case "png":
        case "jpg":
        case "jpeg":
            if (file_exists("../img/products/$oldImg")) {
                unlink("../img/products/$oldImg");
            }
            $uploadTo = "../img/products/";
            if (!file_exists($uploadTo)) {
                mkdir($uploadDir, 0777, true);
            }
            $newImg = md5(time()) . "." . end($check);
            $moveTo = $uploadTo . $newImg;
            move_uploaded_file($_FILES['image']['tmp_name'], $moveTo);
            $img = "`image` = '$newImg'";
            break;
    }
}

echo $query = "UPDATE `products` SET 
`name` = '$name', 
`company` = '$company', 
`type` = '$type', 
$img, 
`create_date` = '$createDate' 
WHERE `products`.`id` = $id";
$res = $con->query($query);

header("Location: ../admin.php?tool=products&edit=product&id=$id");
