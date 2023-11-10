<?php 
if (isset($_POST['confirm'])) {
    $pid = $_POST['pid'];
    // $img =  file_get_contents($_FILES['img']['tmp_name']);
    $fileName = $_FILES['img']['name'];
        $tmpName = $_FILES['img']['tmp_name'];
        $imgExtension = explode('.', $fileName);
        $imgExtension = strtolower(end($imgExtension));
        $img = uniqid();
        $img .= '.' . $imgExtension;
        move_uploaded_file($tmpName, '../uploadImg/' . $img);
    $design_type = $_POST['design_type'];
    $design_description = $_POST['design_description'];


    include '../classes/dbh.php';
    include '../classes/admin.class.php';

    $admin = new admin();
    $design = $admin->adddesign($img, $design_type, $design_description, $pid);
    header("location: ../projects.php");

}
