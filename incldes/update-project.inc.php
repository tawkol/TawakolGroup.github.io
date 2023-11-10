<?php
session_start();
$theme1old = $_SESSION["theme1"];
$theme2old = $_SESSION["theme2"];
$theme3old = $_SESSION["theme3"];
$theme4old = $_SESSION["theme4"];
$theme5old = $_SESSION["theme5"];
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    if (file_exists($_FILES['theme1']['tmp_name'])) {
        // $theme1 = file_get_contents($_FILES['theme1']['tmp_name']);
        $fileName1 = $_FILES['theme1']['name'];
        $tmpName1 = $_FILES['theme1']['tmp_name'];
        $imgExtension1 = explode('.', $fileName1);
        $imgExtension1 = strtolower(end($imgExtension1));
        $theme1 = uniqid();
        $theme1 .= '.' . $imgExtension1;
        move_uploaded_file($tmpName1, '../uploadImg/' . $theme1);
    } else {
        $theme1 = $theme1old;
    }
    if (file_exists($_FILES['theme2']['tmp_name'])) {
        // $theme2 = file_get_contents($_FILES['theme2']['tmp_name']);
        $fileName2 = $_FILES['theme2']['name'];
        $tmpName2 = $_FILES['theme2']['tmp_name'];
        $imgExtension2 = explode('.', $fileName2);
        $imgExtension2 = strtolower(end($imgExtension2));
        $theme2 = uniqid();
        $theme2 .= '.' . $imgExtension2;
        move_uploaded_file($tmpName2, '../uploadImg/' . $theme2);
    } else {
        $theme2 = $theme2old;
    }
    if (file_exists($_FILES['theme3']['tmp_name'])) {
        // $theme3 = file_get_contents($_FILES['theme3']['tmp_name']);
        $fileName3 = $_FILES['theme3']['name'][$i];
        $tmpName3 = $_FILES['theme3']['tmp_name'][$i];
        $imgExtension3 = explode('.', $fileName3);
        $imgExtension3 = strtolower(end($imgExtension3));
        $theme3 = uniqid();
        $theme3 .= '.' . $imgExtension3;
        move_uploaded_file($tmpName3, '../uploadImg/' . $theme3);
    } else {
        $theme3 = $theme3old;
    }
    if (file_exists($_FILES['theme4']['tmp_name'])) {
        // $theme4 = file_get_contents($_FILES['theme4']['tmp_name']);
        $fileName4 = $_FILES['theme4']['name'][$i];
        $tmpName4 = $_FILES['theme4']['tmp_name'][$i];
        $imgExtension4 = explode('.', $fileName4);
        $imgExtension4 = strtolower(end($imgExtension4));
        $theme4 = uniqid();
        $theme4 .= '.' . $imgExtension4;
        move_uploaded_file($tmpName4, '../uploadImg/' . $theme4);
    } else {
        $theme4 = $theme4old;
    }
    if (file_exists($_FILES['theme5']['tmp_name'])) {
        // $theme5 = file_get_contents($_FILES['theme5']['tmp_name']);
        $fileName5 = $_FILES['theme5']['name'][$i];
        $tmpName5 = $_FILES['theme5']['tmp_name'][$i];
        $imgExtension5 = explode('.', $fileName5);
        $imgExtension5 = strtolower(end($imgExtension5));
        $theme5 = uniqid();
        $theme5 .= '.' . $imgExtension5;
        move_uploaded_file($tmpName5, '../uploadImg/' . $theme5);
    } else {
        $theme5 = $theme5old;
    }
    include "../classes/dbh.php";
    include "../classes/update-project.classes.php";
    $update = new UpdateProjects();
    $update->updateProject($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id);
    header("Location: ../worker-home.php");
}
