<?php
if (isset($_POST['confirm'])) {
    $pid = $_POST['pid'];
    $status = $_POST['status'];
    $sd = $_POST['sd'];
    $fd = $_POST['fd'];
    $budjet = $_POST['budget'];
    $address = $_POST['address'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $project = $admin->updateProject($status, $sd, $fd, $budjet, $address, $pid);
    header("location: ../projects.php");

}
