<?php

require_once("./funcs/DBinteraction.php");
$query = "SELECT 
instances.id, 
products.name AS `name`, 
statuses.name AS `status` 

FROM instances 

INNER JOIN products ON instances.product = products.id 
INNER JOIN statuses ON instances.`status` = statuses.id

ORDER BY `instances`.`instance` ASC";
$instances = selectFrom($query, "ALL");

?>
<div class="list flex column g10 wcenter">
    <a href="?tool=instances&edit=instance" class="accent ctrl-e brad10">+ Добавить</a>
    <?php
    require("./funcs/listGenerator.php");
    ?>
    <h2>На складе:</h2>
    <?php
    $emptyList = true;
    foreach ($instances as $instance) {
        if ($instance['status'] == "На складе") {
            generateListItem($instance, "instance");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Склад пуст.</p>
    <?php
    }
    ?>
    <h2>В эксплуатации:</h2>
    <?php
    $emptyList = true;
    foreach ($instances as $instance) {
        if ($instance['status'] == "В эксплуатации") {
            generateListItem($instance, "instance");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Нет экземпляров в эксплуатации.</p>
    <?php
    }
    ?>
    <h2>Списаны:</h2>
    <?php
    $emptyList = true;
    foreach ($instances as $instance) {
        if ($instance['status'] == "Списан") {
            generateListItem($instance, "instance");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Нет списанных экземпляров.</p>
    <?php
    }
    ?>
</div>