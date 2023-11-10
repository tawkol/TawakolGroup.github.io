<?php
session_start();
include './classes/dbh.php';
include './classes/admin.class.php';

$admin = new admin();
if (isset($_GET['id'])) {
    $sid = $_GET['id'];
    $supplier = $admin->selectSupplier($sid);
    $row = $supplier->fetch();
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
    <title> Update supplier </title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Update <b>Supplier</b></h2>
            </div>
            <table class="insrt_project">
                <thead>
                    <tr>
                        <th> name</th>
                        <th> type</th>
                        <th>address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="./incldes/update-suppliers.inc.php" method="post">
                        <input type="hidden" name="sid" value="<?php echo $row['supplier_ID'] ?>" />
                        <tr>
                            <td> <input type="text" name="name" value="<?php echo $row['supplier_name']; ?>"> </td>
                            <td> <input type="text" name="type" value="<?php echo $row['supplier_type']; ?>"> </td>
                            <td> <input type="text" name="address" value="<?php echo $row['supplier_address']; ?>"> </td>
                            <td> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button> </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    <?php $row = null;
    $supplier = null;
    ?>
</body>

</html>