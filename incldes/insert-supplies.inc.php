<?php 
if (isset($_POST['confirm'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $supplier_ID = $_POST['supplier_ID'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $project = $admin->addsupply($name, $quantity, $price, $date, $supplier_ID ,$pid);
    header("location: ../projects.php");

}
