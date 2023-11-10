<?php 
class UpdateWorker extends Dbh {
    public function updateWorker($fn, $ln, $uid,$email,$img,$area,$phone, $id){
        $stmt = $this->connect()->prepare('UPDATE workers SET worker_fname = ?, worker_lname = ?, worker_username = ?, email = ?, profile_img = ?, phone = ?, area = ? WHERE worker_ID = ? ');
        if (!$stmt->execute(array($fn, $ln, $uid, $email, $img, $phone, $area, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt2 = $this->connect()->prepare('SELECT * FROM workers WHERE worker_username = ? ;');
        
        if (!$stmt2->execute(array($uid))) {
            $stmt2 = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $user = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["workerid"] = $user[0]["worker_ID"];
            $_SESSION["workerfname"] = $user[0]["worker_fname"];
            $_SESSION["workerlname"] = $user[0]["worker_lname"];
            $_SESSION["uid"] = $user[0]["worker_username"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["img"] = $user[0]["profile_img"];
            $_SESSION["exprience"] = $user[0]["exprience"];
            $_SESSION["area"] = $user[0]["area"];
            $_SESSION["phone"] = $user[0]["phone"];
        $stmt = null;
        $stmt2 = null;
    }
}