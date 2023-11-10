<?php

if (isset($_POST["submit-sign-in"])) 
{
    $uid = $_POST["username"] ;
    $pwd = $_POST["pwd"] ;


include "../classes/dbh.php";
include "../classes/admin-login.classes.php";
include "../classes/admin-login.cont.php";
$login = new LoginContr($uid, $pwd);

$login->loginUser();

header("location: ../admin.php");

}
