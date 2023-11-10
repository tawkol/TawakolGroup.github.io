<?php 
class DeleteProjects extends Dbh{
    public function deleteProject($id){
        $stmt = $this->connect()->prepare("DELETE FROM themes WHERE theme_ID = ?");
        if (!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}