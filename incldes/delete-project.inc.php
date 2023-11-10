<?php
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
include "../classes/dbh.php";
include "../classes/delete-project.class.php";
$delete = new DeleteProjects();
$delete->deleteProject($id);
header("location: ../worker-home.php?");
    
}