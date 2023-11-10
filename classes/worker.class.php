<?php
class Worker extends Dbh
{
    public function workerInfo($id)
    {
        $stmt = $this->connect()->query('SELECT * FROM workers WHERE worker_ID =' . $id . ' ;');
        $stmt->execute();
        return $stmt;
    }


    public function workerProject($id)
    {
        $stmt = $this->connect()->prepare('SELECT * from themes WHERE worker_ID  =' . $id . ' ;');
        $stmt->execute();
        return $stmt;
    }
}
