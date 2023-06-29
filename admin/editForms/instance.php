<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT 
instances.id,
products.name AS `name`, 
instances.instance, 
companies.name AS company, 
types.name AS type, 
statuses.name AS `status` 

FROM instances 

INNER JOIN products ON instances.product = products.id 
INNER JOIN companies ON products.company = companies.id 
INNER JOIN types ON products.type = types.id
INNER JOIN statuses ON instances.`status` = statuses.id

WHERE `instances`.`id` = " . $_GET['id'];
$thisInstance = selectFrom($query, "ONE");
?>
<h1>Информация об экземпляре</h1>
<?php
$descInstance = ["Наименование", "Серийный номер",  "Компания производитель", "Тип", "Статус"];

$descInstanceKey = 0;
foreach ($thisInstance as $key => $item) {
    switch ($key) {
        case "id":
            break;
        default:
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descInstance[$descInstanceKey] ?>:</span>
                <span><?= $item ?></span>
            </div>
<?php
            $descInstanceKey++;
            break;
    }
}
?>
<form action="../funcs/changeStatus.php" method="post" class="btns mauto">
    <input type="text" class="hide" name="instance" value="<?= $thisInstance['id'] ?>">
    <select name="status" id="" class="accent">
        <?php
        $query = "SELECT * FROM `statuses`";
        $statuses = selectFrom($query, "ALL");

        foreach ($statuses as $status) {
            $selected = ($status['name'] == $thisInstance['status']) ? "selected" : null;
        ?>
            <option value="<?= $status['id'] ?>" <?= $selected ?>><?= $status['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <button class="accent">Сохранить</button>
</form>