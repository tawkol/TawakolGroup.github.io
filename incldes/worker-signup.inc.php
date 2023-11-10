<?php

if (isset($_POST["submit-sign-up"])) 
{
    $fn = $_POST["fname"] ;
    $ln = $_POST["lname"] ;
    $uid = $_POST["username"] ;
    $email = $_POST["email"] ;
    $pwd = $_POST["pwd"] ;
    $cpwd = $_POST["cpwd"] ;
    $profession_array = $_POST["profession"];
    // $img = file_get_contents($_FILES['img']['tmp_name']);
    $fileName = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name'];
    $imgExtension = explode('.',$fileName);
    $imgExtension = strtolower(end($imgExtension));
    $newImgName = uniqid();
    $newImgName .= '.' . $imgExtension;
    $area = $_POST["area"] ;
    $dob = $_POST["dob"] ;
    $phone = $_POST["phone"] ;
    $exp = $_POST["exp"] ;
    $bank = $_POST["bank"] ;
    $ssn = $_POST["ssn"] ;
    
    $profession = implode(",", $profession_array);

include "../classes/dbh.php";
include "../classes/worker-signup.classes.php";
include "../classes/worker-signup.cont.php";
$signup = new signupContr($fn, $ln, $uid, $email, $pwd, $cpwd, $profession, $newImgName, $area, $dob, $phone, $exp, $bank, $ssn);

$signup->sigupUser();
move_uploaded_file($tmpName, '../uploadImg/' . $newImgName);

header("location: ../worker-home.php?error=none");
}
