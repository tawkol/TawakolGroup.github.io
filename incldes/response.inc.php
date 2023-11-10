<?php 

$reqid = $_POST['req'];
$price = $_POST['price'];

if (isset($_POST["accept"])) {
    $response = 'accept';
}elseif(isset($_POST["reject"])){
    $response = 'reject';
}

include "../classes/dbh.php";
include "../classes/request.classes.php";
$request = new Request();

$request->workerresponse($response, $price, $reqid);

header("location: ../worker-home.php");
