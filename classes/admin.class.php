<?php
class admin extends Dbh
{
    public function deleteRequest($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM request WHERE request_id = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function allprojects()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM projects WHERE status NOT LIKE "finished%";');
        $stmt->execute();
        return $stmt;
    }
    public function projectsHomeSec()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM projects WHERE status NOT LIKE "finished%" ORDER BY RAND() LIMIT 10;');
        $stmt->execute();
        return $stmt;
    }

    public function insertProject($status, $sd, $fd, $budjet, $address, $cid, $wid)
    {
        $stmt = $this->connect()->prepare('INSERT INTO projects (status, start_date, finish_date, project_budget, project_address, client_ID, worker_ID) VALUES (?, ?, ? , ?, ?, ?, ?);');
        if (!$stmt->execute(array($status, $sd, $fd, $budjet, $address, $cid, $wid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function updateProject($status, $sd, $fd, $budjet, $address, $id)
    {
        $stmt = $this->connect()->prepare('UPDATE projects SET status = ?, start_date = ?, finish_date= ?, project_budget= ? , project_address = ? WHERE project_ID = ?;');
        if (!$stmt->execute(array($status, $sd, $fd, $budjet, $address, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function selectProject($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM projects WHERE project_ID = ?;');
        $stmt->execute(array($id));
        return $stmt;
    }

    public function deleteProject($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM projects WHERE project_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function allsuppliers()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM suppliers;');
        $stmt->execute();
        return $stmt;
    }

    public function addsupplier($name, $type, $address)
    {
        $stmt = $this->connect()->prepare('INSERT INTO suppliers (supplier_name, supplier_type, supplier_address) VALUES (?, ?, ?);');
        if (!$stmt->execute(array($name, $type, $address))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function deletesupplier($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM suppliers WHERE supplier_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function updateSupplier($name, $type, $address, $id)
    {
        $stmt = $this->connect()->prepare('UPDATE suppliers SET supplier_name = ?, supplier_type = ?, supplier_address= ? WHERE supplier_ID = ?');
        if (!$stmt->execute(array($name, $type, $address, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function selectSupplier($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM suppliers WHERE supplier_ID = ?');
        $stmt->execute(array($id));
        return $stmt;
    }

    public function deleteuser($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM clients WHERE client_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function deleteworker($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM workers WHERE worker_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function addsupply($name, $quantitty, $price, $date, $sid, $pid)
    {
        $stmt = $this->connect()->prepare('INSERT INTO supplies (items_name, item_quantity, item_price, order_date, supplier_ID, project_ID) VALUES (?, ?, ?, ?, ?, ?);');
        if (!$stmt->execute(array($name, $quantitty, $price, $date, $sid, $pid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function selectsupplies($pid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM supplies WHERE project_ID = ?');
        $stmt->execute(array($pid));
        return $stmt;
    }
    public function selectsuppliesID($pid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM supplies WHERE supplies_ID = ?');
        $stmt->execute(array($pid));
        return $stmt;
    }
    public function deletesupply($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM supplies WHERE supplies_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function updatesupply($name, $quantitty, $price, $date, $id)
    {
        $stmt = $this->connect()->prepare('UPDATE supplies SET items_name = ?, item_quantity = ?, item_price= ?, order_date = ?  WHERE supplies_ID = ?');
        if (!$stmt->execute(array($name, $quantitty, $price, $date, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function adddesign($upload_design, $design_type, $design_description, $pid)
    {
        $stmt = $this->connect()->prepare('INSERT INTO design (upload_design, design_type, design_description, project_ID) VALUES (?, ?, ?, ?);');
        if (!$stmt->execute(array($upload_design, $design_type, $design_description, $pid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function selectDesign($pid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM design WHERE project_ID = ?');
        $stmt->execute(array($pid));
        return $stmt;
    }
    public function deleteDesign($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM design WHERE design_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function updateDesign($upload_design, $design_type, $design_description, $id)
    {
        $stmt = $this->connect()->prepare('UPDATE design SET upload_design = ?, design_type = ?, design_description = ?  WHERE design_ID = ?');
        if (!$stmt->execute(array($upload_design, $design_type, $design_description, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function selectDesignID($id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM design WHERE design_ID = ?');
        $stmt->execute(array($id));
        return $stmt;
    }


    public function addPayment($payment_price, $payment_date, $pid)
    {
        $stmt = $this->connect()->prepare('INSERT INTO payment (payment_price, payment_date, project_ID) VALUES (?, ?, ?);');
        if (!$stmt->execute(array($payment_price, $payment_date, $pid))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function selectPayment($pid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM payment WHERE project_ID = ?');
        $stmt->execute(array($pid));
        return $stmt;
    }
    public function selectPaymentID($pid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM payment WHERE payment_ID = ?');
        $stmt->execute(array($pid));
        return $stmt;
    }
    public function deletePayment($id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM payment WHERE payment_ID = ?');
        if (!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    public function updatePayment($payment_price, $payment_date, $id)
    {
        $stmt = $this->connect()->prepare('UPDATE payment SET payment_price = ?, payment_date = ?  WHERE payment_ID = ?');
        if (!$stmt->execute(array($payment_price, $payment_date, $id))) {
            $stmt = null;
            header("location: ../worker-home.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}
