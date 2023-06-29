<?php
function getEditForm() {
if (!empty($_GET['id'])) {
    if (isset($_GET['edit'])) {
        $edit = $_GET['edit'];
        include("./admin/editForms/$edit.php");
    }
} else {
    if (isset($_GET['edit'])) {
        $edit = $_GET['edit'];
        include("./admin/addForms/$edit.php");
    }
}
}