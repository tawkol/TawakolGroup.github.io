<?php
class charts extends Dbh
{
    public function addressProject()
    {
        $stmt = $this->connect()->prepare('SELECT project_address, COUNT(*) as n FROM projects GROUP BY project_address;');
        $stmt->execute(array());
        return $stmt;
    }

    public function paymentYears()
    {
        $stmt = $this->connect()->prepare("SELECT YEAR(payment_date) As date, sum(payment_price) As sum FROM payment GROUP BY YEAR(payment_date) ORDER BY YEAR(payment_date);");
        $stmt->execute(array());
        return $stmt;
    }
    public function sumOfYear($year)
    {
        $stmt = $this->connect()->prepare("SELECT YEAR(payment_date) As date, sum(payment_price) As sum FROM payment WHERE YEAR(payment_date) = ? GROUP BY YEAR(payment_date) ORDER BY YEAR(payment_date);");
        $stmt->execute(array($year));
        return $stmt;
    }
    public function paymentsPerYear($year)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE YEAR(payment_date) = ? GROUP BY MONTH(payment_date) ORDER BY MONTH(payment_date);");
        $stmt->execute(array($year));
        return $stmt;
    }
    public function paymentsPermonths($month)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE MONTH(payment_date) =? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($month));
        return $stmt;
    }
    public function paymentsPermonth_and_year($month, $year)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE MONTH(payment_date) = ? AND YEAR(payment_date) = ? GROUP BY MONTH(payment_date) ORDER BY MONTH(payment_date);");
        $stmt->execute(array($month, $year));
        return $stmt;
    }
    public function allDaysPerMonthPerYear($month, $year)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%D-%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE MONTH(payment_date) = ? AND YEAR(payment_date) = ? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($month, $year));
        return $stmt;
    }
    public function paymentsPerday($day)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%D-%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE DAY(payment_date) = ? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($day));
        return $stmt;
    }
    public function paymentsPerday_and_month($day,$month)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%D-%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE DAY(payment_date) = ? AND MONTH(payment_date) = ? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($day , $month));
        return $stmt;
    }
    public function paymentsPerday_and_year($day,$year)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%D-%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE DAY(payment_date) = ? AND YEAR(payment_date) = ? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($day , $year));
        return $stmt;
    }
    public function paymentsPerday_and_month_and_year($day,$month, $year)
    {
        $stmt = $this->connect()->prepare("SELECT date_format(payment_date,'%D-%M-%Y') As date, sum(payment_price) As sum FROM payment WHERE DAY(payment_date) = ? AND MONTH(payment_date) = ? AND YEAR(payment_date) = ? GROUP BY (payment_date) ORDER BY (payment_date);");
        $stmt->execute(array($day,$month, $year));
        return $stmt;
    }

}
