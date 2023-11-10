<?php

class login extends Dbh
{

    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM admin WHERE username = ? ;');

        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("location: ../admin-sign.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../admin-sign.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd =  $pwdHashed[0]['password'];

        if ($checkPwd == null) {
            $stmt = null;
            header("location: ../admin-sign.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM admin WHERE username = ?  AND password = ?;');

            if (!$stmt->execute(array($uid, $pwd))) {
                $stmt = null;
                header("location: ../admin-sign.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../admin-sign.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["uid"] = $user[0]["username"];
            $_SESSION["fn"] = $user[0]["fn"];
            $_SESSION["ln"] = $user[0]["ln"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["role"] = $user[0]["role"];
            $_SESSION['randNum'] = rand(0, 2);

        }

        $stmt = null;
    }
}
