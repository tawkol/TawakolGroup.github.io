<?php
session_start();
include './classes/dbh.php';
include './classes/getusers.class.php';
include './classes/admin.class.php';

$admin = new admin();
$users = new getusers();
$user = $users->Allworker();
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
    <title>Workers</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Manage <b>Workers</b></h2>
            </div>
            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> Worker_ID </th>
                        <th>Worker name</th>
                        <th> username</th>
                        <th>email</th>
                        <th>profession</th>
                        <th>Area</th>
                        <th>phone</th>
                        <th>bank account</th>
                        <th> SSN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($user->rowCount() > 0) {
                        while ($row = $user->fetch()) {
                    ?>
                            <tr>
                                <td> <?php echo $row['worker_ID']; ?> </td>
                                <td> <?php echo $row['worker_fname'] . ' ' .  $row['worker_lname']; ?> </td>
                                <td><?php echo $row['worker_username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['profession']; ?></td>
                                <td><?php echo $row['area']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['bank_account']; ?></td>
                                <td><?php echo $row['SSN']; ?></td>
                                <td class="actions">
                                    <form action="./incldes/admin-deleteworker.inc.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['worker_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        $user = null;
                        $row = null;
                    } else {
                        $user = null;
                        $row = null;

                        ?>
                        <tr>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                        </tr>
                    <?php } ?>
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