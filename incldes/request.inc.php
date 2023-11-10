<?php
if (isset($_POST["request"])) 
{

    $uid = $_POST["uid"] ;
    $wid = $_POST["wid"] ;
    $address = $_POST["address"] ;
    $rnum = $_POST["Room-Number"] ;
    $rtype_array = $_POST["Room-type"] ;
    $rtype = implode(", ", $rtype_array);
    $sdate = $_POST["sdate"] ;
    // $design = file_get_contents($_FILES['Your-design']['tmp_name']);
    $fileName = $_FILES['Your-design']['name'];
    $tmpName = $_FILES['Your-design']['tmp_name'];
    $imgExtension = explode('.',$fileName);
    $imgExtension = strtolower(end($imgExtension));
    $newImgName = uniqid();
    $newImgName .= '.' . $imgExtension;
    move_uploaded_file($tmpName, '../uploadImg/' . $newImgName);
    $msg = $_POST["Massage"] ;


include "../classes/dbh.php";
include "../classes/request.classes.php";
$request = new Request();

$request->request($address, $rnum, $rtype, $sdate, $newImgName, $msg, $uid, $wid);

header("location: ../alart.html?");

}
