<?php
require_once("./funcs/DBinteraction.php");
?>
    <form action="../funcs/addInstance.php" method="post" class="flex column g10 ai-c">
        <h2 class="ctrl-e">Добавить экземпляр:</h2>
        <input type="text" class="hide" name="instance" value="<?= $thisInstance['id'] ?>">
        <span>Наименование</span>
        <select name="product" id="" class="accent">
            <option value selected disabled>Выберите из списка</option>
            <?php
            $query = "SELECT * FROM `products`";
            $products = selectFrom($query, "ALL");

            foreach ($products as $product) {
                $selected = ($product['name'] == $thisInstance['product']) ? "selected" : null;
            ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <span>Серийный номер</span>
        <input type="text" name="instance" class="inner-shadow p10 brad10 ctrl-e" placeholder="ХХХХХХХХХХХХХХХХ" title="16 символов, заглавные латинские и цифры" pattern="[A-Z0-9]{16}">
    <button class="accent">Сохранить</button>
    </form>