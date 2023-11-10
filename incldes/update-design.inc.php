<?php
session_start();
$oldimg = $_SESSION["oldimg"];
if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $design_type = $_POST['type'];
    $design_description = $_POST['description'];


    if (file_exists($_FILES['newimg']['tmp_name'])) {
        $fileName = $_FILES['newimg']['name'];
        $tmpName = $_FILES['newimg']['tmp_name'];
        $imgExtension = explode('.', $fileName);
        $imgExtension = strtolower(end($imgExtension));
        $img = uniqid();
        $img .= '.' . $imgExtension;
        move_uploaded_file($tmpName, '../uploadImg/' . $img);
    } else {
        $img = $oldimg;
    }

    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $design = $admin->updateDesign($img, $design_type, $design_description, $id);
    header("location: ../projects.php");
}
