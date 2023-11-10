<?php

if (isset($_POST["submit"])) 
{
    $fn = $_POST["fname"] ;
    $ln = $_POST["lname"] ;
    $email = $_POST["email"] ;
    $uid = $_POST["username"] ;
    $pwd = $_POST["password"] ;
    $cpwd = $_POST["Cpassword"] ;
    $phone = $_POST["phone"] ;
    $dob = $_POST["dob"] ;
    $gender = $_POST["gender"] ;
    $ssn = $_POST["ssn"] ;

include "../classes/dbh.php";
include "../classes/signup.classes.php";
include "../classes/signup.cont.php";
$signup = new signupContr($fn, $ln, $uid, $email, $pwd, $cpwd, $dob, $gender, $phone, $ssn);

$signup->sigupUser();

header("location: ../index.php?error=none");
}
