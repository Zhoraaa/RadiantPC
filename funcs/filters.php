<?php
function getFilters()
{
    $wheres = [
        "types" => "Тип товара",
        "companies" => "Старана-производитель"
    ];
    $sortByMany = [
        "products.name ASC" => "По имени (А-Я)",
        "products.name DESC" => "По имени (Я-А)",
        "products.create_date ASC" => "Сначала новые",
        "products.create_date DESC" => "Сначала старые"
    ];
?>
    <form id="filters" class="btns g10 p10">
        <?php
        require_once("./funcs/DBinteraction.php");
        foreach ($wheres as $concat => $placeholder) {
            $query = "SELECT * FROM `$concat`";
            $options = selectFrom($query, "ALL");
        ?>
            <select name="<?= $concat ?>" class="block p10 brad10 accent">
                <option value disabled selected><?= $placeholder ?></option>
                <?php
                foreach ($options as $option) {
                    $selected = ($_GET[$concat] == $option['id']) ? "selected" : null;
                ?>
                    <option value="<?= $option['id'] ?>" <?= $selected ?>><?= $option['name'] ?></option>
                <?php
                }
                ?>
            </select>
        <?php
        }
        ?>
        <select id="order_by" name="order_by" class="block p10 brad10 accent">
            <option value disabled selected>Сортировка</option>
            <?php
            foreach ($sortByMany as $concat => $placeholder) {
                $selected = ($_GET['order_by'] == $concat) ? "selected" : null;
            ?>
                <option value="<?= $concat ?>" <?= $selected ?>><?= $placeholder ?></option>
            <?php
            }
            ?>
        </select>
        <button class="radius p10 brad10 accent">Применить</button>
        <a href="?" class="radius p10 brad10 accent">Сброс</a>
    </form>
<?php
}

function applyFilters()
{
    $where = (isset($_GET['types']) ||
        isset($_GET['companies']) 
    ) ? " WHERE . AND " : null;
    if ($where) {
        $whereSQL = explode(".", $where);
        $whereVars = [
            "type" => ($_GET['types']) ?? null,
            "company" => ($_GET['companies']) ?? null
        ];
        $where = "";
        $key = 0;
        foreach ($whereVars as $table => $search) {
            if ($search) {
                $where .= $whereSQL[$key] . "`products`.`" . $table . "` = " . $search;
                if ($key == 0) {
                    $key++;
                }
            }
        }
        $return['where'] = $where;
    }
    if (isset($_GET['order_by'])) {
        $return['sortBy'] = (isset($_GET['order_by'])) ? "ORDER BY " . $_GET['order_by'] : null;
    }
    $return = ($return) ?? null;
    return $return;
}
