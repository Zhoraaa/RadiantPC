<?php
function selectFrom($query, $way)
{
    if (trim($query) == null) {
        $_SESSION['result'] = "Вы передали пустой запрос.";
    } else {
    require "connect.php";
    $res = $con->query($query);

    switch ($way) {
        case "ALL":
            $output = $res->fetch_all(MYSQLI_ASSOC);
            break;
        case "ONE":
            $output = $res->fetch_assoc();
            break;
    }}
    return $output;
}

function insertOrUpdate($query)
{
    if (!trim($query)) {
        $_SESSION['result'] = "Вы передали пустой запрос.";
        $output = false;
    } else {
        require "connect.php";
        $res = $con->query($query);
        $output = true;
    }
    return $output;
}