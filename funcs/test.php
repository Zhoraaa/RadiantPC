<?php
function test($array, $query)
{
    if (isset($query)) {
        echo "<br>" . $query;
    }
    if (!empty($array)) {
        echo "Ваш массив: <br><pre>";
        print_r($array);
        echo "</pre><br>";
    }
    $result = ($_SESSION['result']) ?? "NULL";
    echo '$_SESSION[\'result\'] = ' . $result;
}
