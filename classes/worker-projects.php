<?php 
class worker_projects extends Dbh {
    public function project($id){
        $stmt = $this->connect()->prepare('SELECT * FROM themes WHERE worker_ID = ?;');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
            exit();
        }else{
             $stmt->execute();
            
        }
        return $stmt;

    }
}