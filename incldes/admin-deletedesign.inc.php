<?php 
if (isset($_POST['delete'])) {

    $id = $_POST['id'];
    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $design = new admin();
    $design->deleteDesign($id);
    header('location: ../projects.php');
}