<?php

require_once("./funcs/listGenerator.php");
require_once("./funcs/DBinteraction.php");

$query = "SELECT * FROM `companies`";
$companies = selectFrom($query, "ALL");

$query = "SELECT * FROM `types`";
$types = selectFrom($query, "ALL");
?>
<div class="flex wrap g20 mauto">
    <div class="list flex column g10">
        <h4>Компании-производители:</h4>
        <a href="?tool=categories&edit=company" class="accent ctrl-e brad10">+ Добавить</a>
        <?php
        foreach ($companies as $company) {
            generateListItem($company, "company");
        }
        ?>
    </div>
    <div class="list flex column g10">
        <h4>Типы товаров:</h4>
        <a href="?tool=categories&edit=type" class="accent ctrl-e brad10">+ Добавить</a>
        <?php
        foreach ($types as $type) {
            generateListItem($type, "type");
        }
        ?>
    </div>
</div>