<?php
include './dbh.php'; 
class themes extends Dbh{
    function insertThemes($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id){
        $stmt = $this->connect()->prepare('INSERT INTO themes (theme_title, theme1, theme2, theme3, theme4, theme5, worker_ID) VALUES (?, ?, ?, ?, ?, ?, ? );');
        if (!$stmt->execute(array($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
            exit();
        }
    }
}