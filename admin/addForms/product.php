<?php
require_once("./funcs/DBinteraction.php");

$query = "SELECT * FROM `companies`";
$companies = selectFrom($query, "ALL");
$query = "SELECT * FROM `types`";
$types = selectFrom($query, "ALL");
?>
<form action="../funcs/setProductDB.php" method="post" enctype="multipart/form-data" class="flex column g10 ai-c">
    <h2>
        Новый товар:
    </h2>
    <div>
        <div class="toolInfo flex column g10 ai-c">
            <span class="ctrl-e">Название:</span>
            <div><input required type="text" name="name" placeholder="Введите название" class="inner-shadow brad10 p10"></div>
            <span class="ctrl-e">Дата производства:</span>
            <div><input required type="date" name="createDate" class="inner-shadow brad10 p10"></div>
            <span>Изображение:</span>
            <div><input required type="file" name="image" id="image" class="inner-shadow brad10 p10"></div>
            <span class="ctrl-e">Компания-производитель:</span>
            <select name="company" id="company" class="inner-shadow brad10 p10">
            <option value selected disabled>Выберите страну производства</option>
                <?php
                foreach ($companies as $company) {
                ?>
                    <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <span class="ctrl-e">Тип:</span>
            <select name="type" id="type" class="inner-shadow brad10 p10">
            <option value selected disabled>Выберите тип товара</option>
                <?php
                foreach ($types as $type) {
                ?>
                    <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="btns">
        <button class="accent">Добавить</button>
        <a href="../admin.php?tool=products" class="accent">Отмена</a>
    </div>
</form>