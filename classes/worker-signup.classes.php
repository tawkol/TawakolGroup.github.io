<?php 

class Signup extends Dbh {

    protected function setUser($fname, $lname, $uid, $email, $pwd, $profession, $img, $area, $dob, $phone, $exp, $bank, $ssn) {
        $stmt = $this->connect()->prepare('INSERT INTO workers (worker_fname, worker_lname, worker_username, email, pass, profession, profile_img, area, DOB, phone, exprience, bank_account, SSN) VALUES (?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array( $fname, $lname, $uid, $email, $hashedPwd, $profession, $img, $area, $dob, $phone, $exp, $bank, $ssn))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
            exit();
        }
        $stmt2 = $this->connect()->prepare('SELECT * FROM workers WHERE worker_username = ? ;');
        
        if (!$stmt2->execute(array($uid))) {
            $stmt2 = null;
            header("location: ../worker-signup.php?error=stmtfailed");
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
   
   
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT worker_username FROM workers WHERE worker_username = ? OR email = ?;');
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
        }

        //  $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }    
        else 
        $resultCheck = true;
        return $resultCheck;
    }

}