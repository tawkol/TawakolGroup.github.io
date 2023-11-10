<?php

class signupContr extends Signup
{

    private $fname;
    private $lname;
    private $uid;
    private $email;
    private $pwd;
    private $cpwd;
    private $profession;
    private $img;
    private $area;
    private $dob;
    private $phone;
    private $exp;
    private $bank;
    private $ssn;

    public function __construct($fname, $lname, $uid, $email, $pwd, $cpwd, $profession, $img, $area, $dob, $phone, $exp, $bank, $ssn)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->cpwd = $cpwd;
        $this->profession = $profession;
        $this->img = $img;
        $this->area = $area;
        $this->dob = $dob;
        $this->phone = $phone;
        $this->exp = $exp;
        $this->bank = $bank;
        $this->ssn = $ssn;
    }

    public function sigupUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../worker-sign.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../worker-sign.php?error=invalidUid");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../worker-sign.php?error=invalidEmail");
            exit();
        }
        if ($this->invalidDate() == false) {
            header("location: ../worker-sign.php?error=invalidDate");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../worker-sign.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../worker-sign.php?error=usernameoremailtaken");
            exit();
        }
        $this->setUser($this->fname, $this->lname, $this->uid, $this->email, $this->pwd, $this->profession, $this->img, $this->area, $this->dob, $this->phone, $this->exp, $this->bank, $this->ssn);
    }

    private function emptyInput()
    {
        if (empty($this->fname) || empty($this->lname) || empty($this->uid) || empty($this->email) || empty($this->pwd) || empty($this->cpwd) || empty($this->profession) || empty($this->img) ||empty($this->area) || empty($this->dob) || empty($this->phone) || empty($this->exp) || empty($this->bank) || empty($this->ssn)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid()
    {
        // $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        // $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidDate()
    {
        // $result;
        $year = explode("-", $this->dob);
        $age = date("Y") - $year[0];
        if ($age < 18) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        // $result;
        if ($this->pwd !== $this->cpwd) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {
        // $result;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
