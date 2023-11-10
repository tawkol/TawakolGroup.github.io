<?php 
class Workers extends Dbh{
    public function worker(){
        $stmt = $this->connect()->query('SELECT * FROM workers;');
        $stmt->execute();
        return $stmt;
    }
    public function Contractor(){
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE profession LIKE "%contractor%" ;');
        $stmt->execute();
        return $stmt;
    }
    public function InteriorDesign(){
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE profession LIKE "%interior design%" ;');
        $stmt->execute();
        return $stmt;
    }
    public function Plumber(){
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE profession LIKE "%plumber%" ;');
        $stmt->execute();
        return $stmt;
    }
    public function Electrician(){
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE profession LIKE "%electrician%" ;');
        $stmt->execute();
        return $stmt;
    }
    public function Painter(){
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE profession LIKE "%painter%" ;');
        $stmt->execute();
        return $stmt;
    }
}
