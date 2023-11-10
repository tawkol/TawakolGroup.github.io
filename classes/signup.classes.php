<?php 

class Signup extends Dbh {

    protected function setUser($fname, $lname, $uid, $email, $pwd, $dob, $gender, $phone, $ssn) {
        $stmt = $this->connect()->prepare('INSERT INTO clients (client_fname, client_lname, username, email, pass, DOB, gender, phone, SSN) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array( $fname, $lname, $uid, $email, $hashedPwd, $dob, $gender, $phone, $ssn))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
        $stmt2 = $this->connect()->prepare('SELECT * FROM clients WHERE username = ? ;');
        
        if (!$stmt2->execute(array($uid))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
        $user = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["client_ID"];
            $_SESSION["useruid"] = $user[0]["username"];
        $stmt = null;
        $stmt2 = null;
    }
   
   
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT username FROM clients WHERE username = ? OR email = ?;');
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
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