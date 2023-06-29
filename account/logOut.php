<?php
setcookie("user", $account['id'], time(), "/");
header("location: ../index.php");
?>