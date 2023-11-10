<?php 
if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $payment = new admin();
    $payment->updatePayment($price, $date, $id); 
    header("location: ../projects.php");
}