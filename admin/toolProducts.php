<?php

require_once("./funcs/listGenerator.php");
require_once("./funcs/DBinteraction.php");

$query = "SELECT * FROM `products`";
$products = selectFrom($query, "ALL");
?>
<div class="list flex column g10 wcenter">
    <h2>Товары:</h2>
    <a href="?tool=products&edit=product" class="accent ctrl-e brad10">+ Добавить</a>
    <?php
    foreach ($products as $product) {
        generateListItem($product, "product");
    }
    ?>
</div>