<?php
if (isset($_POST['year'], $_POST['month'], $_POST['day'])) {
    include '../classes/dbh.php';
    include '../classes/charts.class.php';
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $charts = new charts();
    if ($year === "all" && ($month === "" || $month === "all") && ($day === "" || $day === "all")) {
        $years = $charts->paymentYears();
        if ($years->rowCount() > 0) {
            while ($row = $years->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && $month === "" && $day === "") {
        $yearSum = $charts->sumOfYear($year);
        if ($yearSum->rowCount() > 0) {
            while ($row = $yearSum->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && $month === "all" && $day === "") {
        $allmonths = $charts->paymentsPerYear($year);
        if ($allmonths->rowCount() > 0) {
            while ($row = $allmonths->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year === "all" && $month > 0 && $day === "") {
        $stmt = $charts->paymentsPermonths($month);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && $month > 0 && $day === "") {
        $stmt = $charts->paymentsPermonth_and_year($month, $year);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && $month > 0 && $day === "all") {
        $stmt = $charts->allDaysPerMonthPerYear($month, $year);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year === "all" && ($month === "" || $month === "all") && $day > 0) {
        $stmt = $charts->paymentsPerday($day);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year === "all" && $month > 0 && $day > 0) {
        $stmt = $charts->paymentsPerday_and_month($day, $month);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && ($month === "" || $month === "all") && $day > 0) {
        $stmt = $charts->paymentsPerday_and_year($day, $year);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } elseif ($year > 0 && $month > 0 && $day > 0) {
        $stmt = $charts->paymentsPerday_and_month_and_year($day, $month, $year);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetchObject()) {
                $data[] =  $row;
            }
        } else {
            $data = array(0 => array('date' => 'zero payments', "sum" => 0));
        }
    } else {
        $data = array(0 => array('date' => 'zero payments', "sum" => 0));
    }
    echo json_encode($data);
}
