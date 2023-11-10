<?php

class login extends Dbh
{

    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT pass FROM workers WHERE worker_username = ? OR email = ?;');

        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../worker-signup.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]['pass']);

        if ($checkPwd == null) {
            $stmt = null;
            header("location: ../worker-signup.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM workers WHERE worker_username = ? OR email = ? AND pass = ?;');

            if (!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../worker-signup.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../worker-signup.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        }

        $stmt = null;
    }
}
