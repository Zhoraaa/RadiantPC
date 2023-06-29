<?php
session_start();

if (isset($_SESSION['mayDel'])) {
    unset($_SESSION['mayDel']);
}