<?php 
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $address = $_POST['address'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $project = $admin->addsupplier($name, $type, $address);
    header("location: ../suppliers.php");
}
