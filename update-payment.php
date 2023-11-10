<?php
session_start();
include './classes/dbh.php';
include './classes/admin.class.php';

$admin = new admin();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $payment = $admin->selectPaymentID($id);
    $row = $payment->fetch();
}
$username = $_SESSION["uid"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/admin.js" defer></script>
    <title> Update payment </title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2> Update <b>payment</b></h2>
            </div>
            <table class="insrt_project">
                <thead>
                    <tr>
                        <th> Price</th>
                        <th>Payment date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="./incldes/update-payment.inc.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['payment_ID'] ?>" />
                        <tr>
                            <td> <input type="number" name="price" value="<?php echo $row['payment_price']; ?>"> </td>
                            <td> <input type="date" name="date" value="<?php echo $row['payment_date']; ?>"> </td>
                            <td> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button> </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    <?php 
    $row = null;
    $payment = null;
     ?>

</body>

</html>