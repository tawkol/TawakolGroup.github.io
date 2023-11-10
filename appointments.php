<?php
session_start();
include './classes/dbh.php';
include './classes/request.classes.php';
include './classes/getusers.class.php';
include './classes/admin.class.php';

$reqs = new Request();
$req =  $reqs->getall();
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
    <title>Appointments</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Request <b>appointments</b></h2>
            </div>
            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> Appointment </th>
                        <th> Client name </th>
                        <th> Client Phone </th>
                        <th> Worker name </th>
                        <th> Worker Phone </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($req->rowCount() > 0) {
                        while ($row = $req->fetch()) {
                            $users = new getusers();
                            $client =  $users->getClient($row['client_ID']);
                            $worker = $users->getWorker($row['worker_id']);
                    ?>
                            <tr>
                                <td> <?php echo $row['appointment']; ?></td>
                                <td> <?php echo $client['client_fname'] . ' ' .  $client['client_lname']; ?> </td>
                                <td> <?php echo $client['phone']; ?></td>
                                <td> <?php echo $worker['worker_fname'] . ' ' .  $worker['worker_lname']; ?> </td>
                                <td> <?php echo $worker['phone']; ?> </td>
                                <td>
                                    <form class="actions" action="./incldes/admin-req.inc.php" method="post">
                                        <input type="hidden" name="req" value="<?php echo $row['request_id']; ?>" />
                                        <input type="hidden" name="wid" value="<?php echo $row['worker_id']; ?>" />
                                        <input type="hidden" name="cid" value="<?php echo $row['client_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                        <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        $row = null;
                        $req = null;
                        $client = null;
                        $worker = null;
                    } else {
                        $row = null;
                        $req = null;
                        $client = null;
                        $worker = null;
                        ?>
                <tbody>
                    <tr>
                        <td> None </td>
                        <td> None </td>
                        <td> None </td>
                        <td> None </td>
                        <td> None </td>
                        <td> None </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pagingType": "full_numbers",
                responsive: true,
            });
        });
    </script>
    </div>
</body>

</html>