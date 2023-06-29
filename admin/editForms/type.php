<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT * FROM `types` WHERE id = " . $_GET['id'];
$type = selectFrom($query, "ONE");
?>
<h2>
    Информация о типе:
</h2>
<div>
    <div class="toolInfo">
        <span class="ctrl-r">Название:</span>
        <span><?= $type['name'] ?></span>
    </div>
</div>
<div class="btns">
    <a href="../admin/delData.php?id=<?= $_GET['id'] ?>" class="accent">Удалить</a>
    <a href="../admin.php?tool=categories" class="accent">Отмена</a>
</div>