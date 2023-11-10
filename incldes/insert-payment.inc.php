<?php 
if (isset($_POST['confirm'])) {
    $pid = $_POST['pid'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $payment = $admin->addPayment($price, $date, $pid);
    header("location: ../projects.php");
}
