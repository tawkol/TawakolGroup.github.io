<?php
session_start();
include './classes/dbh.php';
include './classes/getusers.class.php';
include './classes/admin.class.php';

$pid = $_GET['projectId'];

$admin = new admin();
$supplies = $admin->selectsupplies($pid);
$design = $admin->selectDesign($pid);
$payment = $admin->selectPayment($pid);
$project = $admin->selectProject($pid);
$row = $project->fetch();

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
    <title>Project</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main class="main-project">
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Manage <b>Project</b></h2>
            </div>
            <table id="project" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Client name</th>
                        <th>Worker name</th>
                        <th>Status</th>
                        <th> Start date </th>
                        <th>Finish date</th>
                        <th>Project budget</th>
                        <th>Project address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = new getusers();
                    $client =  $users->getClient($row['client_ID']);
                    $worker = $users->getWorker($row['worker_ID']);
                    ?>
                    <tr>

                        <td> <?php echo $client['client_fname'] . ' ' .  $client['client_lname']; ?> </td>
                        <td> <?php echo $worker['worker_fname'] . ' ' .  $worker['worker_lname']; ?> </td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['finish_date']; ?></td>
                        <td><?php echo 'E£ ' . $row['project_budget']; ?></td>
                        <td><?php echo $row['project_address']; ?></td>
                        <td class="actions">
                            <a href="./admin-update-project.php?id=<?php echo $row['project_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="./incldes/admin-deleteproject.inc.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['project_ID']; ?>" />
                                <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Manage <b>Supplies</b></h2>
                <a href="./supplies.php?projectId=<?php echo $pid; ?>" class="add-new"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <table id="supplies" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> number </th>
                        <th>Items name</th>
                        <th>Item quantity</th>
                        <th>Item price</th>
                        <th> Order date </th>
                        <th> Supplier name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($supplies->rowCount() > 0) {
                        $i = 1;
                        while ($row = $supplies->fetch()) {
                            $suppliers = $admin->selectSupplier($row['supplier_ID']);
                            $supplier = $suppliers->fetch();
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['items_name']; ?></td>
                                <td><?php echo $row['item_quantity']; ?></td>
                                <td><?php echo $row['item_price']; ?></td>
                                <td><?php echo $row['order_date']; ?></td>
                                <td><?php echo $supplier['supplier_name']; ?></td>
                                <td class="actions">
                                    <a href="./admin-update-supplies.php?id=<?php echo $row['supplies_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="./incldes/admin-deletesupplies.inc.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['supplies_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                    } else { ?>
                        <tr>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Project <b>Desgins</b></h2>
                <a href="./desgins.php?projectId=<?php echo $pid; ?>" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <table id="desgins" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> number </th>
                        <th> Design </th>
                        <th> Type </th>
                        <th> Description </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($design->rowCount() > 0) {
                        $i = 1;
                        while ($row = $design->fetch()) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo '<img src="./uploadImg/' . $row['upload_design'] . '"> '; ?></td>
                                <td><?php echo $row['design_type']; ?></td>
                                <td><?php echo $row['design_description']; ?></td>
                                <td class="actions">
                                    <a href="./update-design.php?id=<?php echo $row['design_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="./incldes/admin-deletedesign.inc.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['design_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                    } else { ?>
                        <tr>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Project <b>Payments</b></h2>
                <a href="./payment.php?projectId=<?php echo $pid; ?>" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <table id="payments" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> number </th>
                        <th> Price </th>
                        <th> Payment date </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($payment->rowCount() > 0) {
                        $i = 1;
                        while ($row = $payment->fetch()) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo 'E£ ' . $row['payment_price']; ?></td>
                                <td><?php echo $row['payment_date']; ?></td>
                                <td>
                                    <a href="./update-payment.php?id=<?php echo $row['payment_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                    } else { ?>
                        <tr>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                        </tr>

                    <?php
                    }
                    $row = null;
                    $worker = null;
                    $client = null;
                    $supplies = null;
                    $design = null;
                    $payment = null;
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#project').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#supplies').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#desgins').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#payments').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
            });
        });
    </script>
    </div>
</body>

</html>