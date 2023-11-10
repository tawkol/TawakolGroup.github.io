<?php 
class UpdateProjects extends Dbh{
    public function UpdateProject($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id){
        $stmt = $this->connect()->prepare('UPDATE themes SET theme_title = ?, theme1 = ?, theme2 = ?, theme3 = ?, theme4 = ?, theme5 = ? WHERE theme_ID = ? ');
        if (!$stmt->execute(array($title, $theme1, $theme2, $theme3, $theme4, $theme5, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}