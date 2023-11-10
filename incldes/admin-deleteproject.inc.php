<?php
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
include "../classes/dbh.php";
include '../classes/admin.class.php';
$delete = new admin();
$delete->deleteProject($id);
header("location: ../projects.php");
    
}