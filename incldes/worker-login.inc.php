<?php

if (isset($_POST["submit-sign-in"])) 
{
    $uid = $_POST["username"] ;
    $pwd = $_POST["pwd"] ;


include "../classes/dbh.php";
include "../classes/worker-login.classes.php";
include "../classes/worker-login.cont.php";
$login = new LoginContr($uid, $pwd);

$login->loginUser();

header("location: ../worker-home.php?error=none");

}
