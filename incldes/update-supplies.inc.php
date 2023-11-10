<?php
if (isset($_POST['confirm'])) {
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $project = $admin->updatesupply($name, $quantity, $price, $date, $sid);
    header("location: ../projects.php");
}
