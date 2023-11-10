<?php
session_start();
include './classes/dbh.php';
include './classes/getusers.class.php';
include './classes/admin.class.php';

$admin = new admin();
$projects = $admin->allprojects();
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
    <title>Projects</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Manage <b>Projects</b></h2>
            </div>
            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> number </th>
                        <th> Client name </th>
                        <th> Worker name </th>
                        <th> Status </th>
                        <th> Start date </th>
                        <th> Finish date </th>
                        <th> Project budget </th>
                        <th> Project address </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($projects->rowCount() > 0) {
                        $i = 1;
                        while ($row = $projects->fetch()) {
                            $users = new getusers();
                            $client =  $users->getClient($row['client_ID']);
                            $worker = $users->getWorker($row['worker_ID']);
                    ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $client['client_fname'] . ' ' .  $client['client_lname']; ?> </td>
                                <td> <?php echo $worker['worker_fname'] . ' ' .  $worker['worker_lname']; ?> </td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['finish_date']; ?></td>
                                <td><?php echo 'E£ ' . $row['project_budget']; ?></td>
                                <td><?php echo $row['project_address']; ?></td>
                                <td class="actions">
                                    <a href="./project.php?projectId=<?php echo $row['project_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="./incldes/admin-deleteproject.inc.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['project_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        $projects = null;
                        $client = null;
                        $worker = null;
                        $row = null;
                    } else {
                        $projects = null;
                        $client = null;
                        $worker = null;
                        $row = null;
                        ?>
                        <tr>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
                            <td>none</td>
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