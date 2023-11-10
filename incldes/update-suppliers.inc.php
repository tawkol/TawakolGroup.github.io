<?php 
if (isset($_POST['confirm'])) {
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $address = $_POST['address'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $suppliers = new admin();
    $suppliers->updateSupplier($name, $type, $address, $sid); 
    header("location: ../suppliers.php");
}