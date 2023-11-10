<?php
if (isset($_POST['confirm'])) {
    $cid = $_POST['cid'];
    $wid = $_POST['wid'];
    $status = $_POST['status'];
    $sd = $_POST['sd'];
    $fd = $_POST['fd'];
    $budjet = $_POST['budget'];
    $address = $_POST['address'];

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $project = $admin->insertProject($status, $sd, $fd, $budjet, $address, $cid, $wid);
    header("location: ../projects.php");

}
