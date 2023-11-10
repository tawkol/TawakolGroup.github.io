<?php

if (isset($_POST["submit"])) 
{
    $uid = $_POST["username"] ;
    $pwd = $_POST["password"] ;


include "../classes/dbh.php";
include "../classes/login.classes.php";
include "../classes/login.cont.php";
$login = new LoginContr($uid, $pwd);

$login->loginUser();

header("location: ../index.php?error=none");

}
