<form action="./funcs/addData.php" method="get" class="flex column g10 ai-c">
    <h2>
        Новая компания-производитель:
    </h2>
    <input type="text" class="hide" name="data" value="companies">
    <div>
        <div class="toolInfo">
            <span class="ctrl-r">Название:</span>
            <input type="text" name="name" placeholder="Введите название" class="inner-shadow brad10 p10">
        </div>
    </div>
    <div class="btns">
        <button class="accent">Добавить</button>
        <a href="../admin.php?tool=categories" class="accent">Отмена</a>
    </div>
</form>