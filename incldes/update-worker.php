<?php
session_start();
$oldimg = $_SESSION["img"];
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $fn = $_POST["fname"];
    $ln = $_POST["lname"];
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $area = $_POST["area"];
    $phone = $_POST["phone"];

    if (file_exists($_FILES['newimg']['tmp_name'])) {
        $img = file_get_contents($_FILES['newimg']['tmp_name']);
    } else {
        $img = $oldimg;
    }
    include "../classes/dbh.php";
    include "../classes/update-worker.classes.php";
    $update = new UpdateWorker();
    $update->updateWorker($fn, $ln, $uid, $email, $img, $area, $phone, $id);
    header("Location: ../worker-home.php");
}
