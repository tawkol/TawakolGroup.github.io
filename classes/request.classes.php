<?php
class Request extends Dbh
{
    public function request($address, $rnum, $rtype, $sdate, $design, $msg, $uid, $wid)
    {
        $stmt = $this->connect()->prepare('INSERT INTO request (location, no_of_rooms, room_type, start_date, upload_theme, special_instruction, client_ID, worker_id) VALUES (?, ?, ?, ?, ?, ?, ?, ? );');
        if (!$stmt->execute(array($address, $rnum, $rtype, $sdate, $design, $msg, $uid, $wid))) {
            $stmt = null;
            header("location: ../worker-signup.php?error=stmtfailed");
            exit();
        }
    }
    public function getrequest($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM request WHERE worker_ID = ' . $id .' AND worker_response IS NULL;');
        $stmt->execute();
        return $stmt;
    }
    public function workerresponse($response, $price, $reqid)
    {
        $stmt = $this->connect()->prepare('UPDATE request SET worker_response = ?, price = ? WHERE request_id = ? ');
        if (!$stmt->execute(array($response, $price, $reqid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function getresponse($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM request WHERE client_ID = ' . $id .' AND client_response IS NULL AND price is NOT NULL;');
        $stmt->execute();
        return $stmt;
    }
    public function clientresponse($response, $price, $reqid)
    {
        $stmt = $this->connect()->prepare('UPDATE request SET client_response = ?, appointment = ? WHERE request_id = ? ');
        if (!$stmt->execute(array($response, $price, $reqid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function getall()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM request WHERE appointment IS NOT NULL ');
        $stmt->execute();
        return $stmt;
    }
}
