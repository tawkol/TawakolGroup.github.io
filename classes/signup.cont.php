<?php
 
 class signupContr extends Signup {
    
    private $fname;
    private $lname;
    private $email;
    private $uid;
    private $pwd;
    private $cpwd;
    private $phone;
    private $dob;
    private $gender;
    private $ssn;

    public function __construct($fname, $lname, $uid, $email, $pwd, $cpwd, $dob, $gender, $phone, $ssn){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->cpwd = $cpwd;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->ssn = $ssn;
    }

    public function sigupUser() {
        if ($this->emptyInput() == false){
            // echo "empty input";
            header("location: ../register.php?.error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false){
            header("location: ../register.php?error=invalidUid");
            exit();
        }
        if ($this->invalidEmail() == false){
            header("location: ../register.php?error=invalidEmail");
            exit();
        }
        if ($this->invalidDate() == false){
            header("location: ../register.php?error=invalidDate");
            exit();
        }
        if ($this->pwdMatch() == false){
            header("location: ../register.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false){
            header("location: ../register.php?error=usernameoremailtaken");
            exit();    
        } 
        $this->setUser($this->fname, $this->lname, $this->uid, $this->email, $this->pwd, $this->dob, $this->gender, $this->phone, $this->ssn);
    }    

    private function emptyInput() {
        // $result;
        if (empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->uid) || empty($this->pwd) || empty($this->cpwd) || empty($this->phone) || empty($this->dob) || empty($this->gender) || empty($this->ssn)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    

    private function invalidUid() {
        // $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    

    private function invalidEmail() {
        // $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    

    private function invalidDate() {
        // $result;
        $year = explode("-",$this->dob);
        $age= date("Y") - $year[0];
        if ($age < 18) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    

    private function pwdMatch() {
        // $result;
        if ($this->pwd !== $this->cpwd) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    

    private function uidTakenCheck() {
        // $result;
        if (!$this->checkUser($this->uid, $this->email)) 
        {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }    
 }
 ?>