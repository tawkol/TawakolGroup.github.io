<?php 
session_start();
include '../classes/dbh.php';
include '../classes/admin.class.php';
if (isset($_POST['delete'])) {
                $requestId = $_POST['req'];
                $admin = new admin();
                $admin->deleteRequest($requestId);
            header("location: ../admin.php?error=none");
            } elseif (isset($_POST['confirm'])) {
                $cId = $_POST['cid'];
                $wId = $_POST['wid'];
                $_SESSION['CID'] = $cId;
                $_SESSION['WID'] = $wId;
                $admin = new admin();
                $requestId = $_POST['req'];
                $admin->deleteRequest($requestId);
                header("location: ../insert-project.php?error=none");
            }