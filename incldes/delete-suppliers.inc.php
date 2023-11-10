<?php 
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $supplier = $admin->deletesupplier($id);
    header("location: ../suppliers.php");

}