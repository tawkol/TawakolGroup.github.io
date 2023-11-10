<?php 
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $user = $admin->deleteworker($id);
    header("location: ../registered-workers.php");
}