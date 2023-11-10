<?php
session_start();

include './classes/dbh.php';
include './classes/getusers.class.php';
include './classes/admin.class.php';

$admin = new admin();
$username = $_SESSION["uid"];

if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    $project = $admin->selectProject($pid);
    $row = $project->fetch();
}
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
    <title>update project</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2> Update <b>project</b></h2>
            </div>
            <table class="insrt_project">
                <thead>
                    <tr>
                        <th>Status </th>
                        <th>Start date</th>
                        <th>Finish date</th>
                        <th>Project budget</th>
                        <th>Project address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="./incldes/admin-update-project.inc.php" method="post">
                        <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                        <tr>
                            <td> <input type="text" name="status" value="<?php echo $row['status']; ?>"> </td>
                            <td> <input type="date" name="sd" value="<?php echo $row['start_date']; ?>"> </td>
                            <td> <input type="date" name="fd" value="<?php echo $row['finish_date']; ?>"> </td>
                            <td> <input type="text" name="budget" value="<?php echo $row['project_budget']; ?>"> </td>
                            <td> <input type="text" name="address" value="<?php echo $row['project_address']; ?>"> </td>
                            <td> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button> </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    <?php 
    $project = null;
    $row = null;
    ?>
</body>

</html>