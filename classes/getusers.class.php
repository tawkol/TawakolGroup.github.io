<?php

class getusers extends Dbh
{
    public function getClient($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM clients WHERE client_ID =' . $id . ';');
        $stmt->execute();
        $r = $stmt->fetch();
        return $r;
    }
    public function getWorker($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM workers WHERE worker_ID =' . $id . ';');
        $stmt->execute();
        $r = $stmt->fetch();
        return $r;
    }

    public function Allworker()
    {
        $stmt = $this->connect()->query('SELECT * FROM workers;');
        $stmt->execute();
        return $stmt;
    }
    public function Allusers()
    {
        $stmt = $this->connect()->query('SELECT *  FROM clients;');
        $stmt->execute();
        return $stmt;
    }
    public function Topworker()
    {
        $stmt = $this->connect()->query('SELECT * FROM workers ORDER BY worker_ID DESC LIMIT 4;');
        $stmt->execute();
        return $stmt;
    }
    public function Recentusers()
    {
        $stmt = $this->connect()->query('SELECT *  FROM clients ORDER BY client_ID DESC LIMIT 4;');
        $stmt->execute();
        return $stmt;
    }
}
