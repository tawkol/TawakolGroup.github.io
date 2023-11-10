<?php 

$reqid = $_POST['req'];
$appointment = $_POST['appointment'];

if (isset($_POST["accept"])) {
    $response = 'accept';
}elseif(isset($_POST["reject"])){
    $response = 'reject';
}

include "../classes/dbh.php";
include "../classes/request.classes.php";

$request = new Request();
$request->clientresponse($response, $appointment, $reqid);

header("location: ../index.php");
