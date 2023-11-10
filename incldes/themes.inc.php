
<?php

if (isset($_POST["submit"])) {
    session_start();

    $id = $_SESSION["workerid"];
    $lenght = count($_POST["theme_title"]);
    include "../classes/dbh.php";
    include "../classes/themes.php";
    for ($i = 0; $i < $lenght; $i++) {
        $title  = $_POST["theme_title"][$i];
        // $theme1 =  file_get_contents($_FILES["theme1"]['tmp_name'][$i]);
        // $theme2 =  file_get_contents($_FILES['theme2']['tmp_name'][$i]);
        // $theme3 =  file_get_contents($_FILES['theme3']['tmp_name'][$i]);
        // $theme4 =  file_get_contents($_FILES['theme4']['tmp_name'][$i]);
        // $theme5 =  file_get_contents($_FILES['theme5']['tmp_name'][$i]);
        $fileName1 = $_FILES['theme1']['name'][$i];
        $tmpName1 = $_FILES['theme1']['tmp_name'][$i];
        $imgExtension1 = explode('.', $fileName1);
        $imgExtension1 = strtolower(end($imgExtension1));
        $theme1 = uniqid();
        $theme1 .= '.' . $imgExtension1;

        $fileName2 = $_FILES['theme2']['name'][$i];
        $tmpName2 = $_FILES['theme2']['tmp_name'][$i];
        $imgExtension2 = explode('.', $fileName2);
        $imgExtension2 = strtolower(end($imgExtension2));
        $theme2 = uniqid();
        $theme2 .= '.' . $imgExtension2;
        
        $fileName3 = $_FILES['theme3']['name'][$i];
        $tmpName3 = $_FILES['theme3']['tmp_name'][$i];
        $imgExtension3 = explode('.', $fileName3);
        $imgExtension3 = strtolower(end($imgExtension3));
        $theme3 = uniqid();
        $theme3 .= '.' . $imgExtension3;
        
        $fileName4 = $_FILES['theme4']['name'][$i];
        $tmpName4 = $_FILES['theme4']['tmp_name'][$i];
        $imgExtension4 = explode('.', $fileName4);
        $imgExtension4 = strtolower(end($imgExtension4));
        $theme4 = uniqid();
        $theme4 .= '.' . $imgExtension4;
       
        $fileName5 = $_FILES['theme5']['name'][$i];
        $tmpName5 = $_FILES['theme5']['tmp_name'][$i];
        $imgExtension5 = explode('.', $fileName5);
        $imgExtension5 = strtolower(end($imgExtension5));
        $theme5 = uniqid();
        $theme5 .= '.' . $imgExtension5;


        $theme = new themes();
        $theme->insertThemes($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id);
        move_uploaded_file($tmpName1, '../uploadImg/' . $theme1);
        move_uploaded_file($tmpName2, '../uploadImg/' . $theme2);
        move_uploaded_file($tmpName3, '../uploadImg/' . $theme3);
        move_uploaded_file($tmpName4, '../uploadImg/' . $theme4);
        move_uploaded_file($tmpName5, '../uploadImg/' . $theme5);
    }



    header("location: ../worker-home.php");
}
?>