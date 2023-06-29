<?php
require "connect.php";
if (isset($_COOKIE['user'])) {
  $query = "SELECT * FROM `users` WHERE `id` = ".$_COOKIE['user'];
  $res = $con->query($query);
  $user = mysqli_fetch_assoc($res);
}