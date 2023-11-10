<?php
session_start();
if (isset($_SESSION['CID'])) {
    $cid = $_SESSION['CID'];
    $wid = $_SESSION['WID'];
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
    <title>Create project</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Insert into <b>Project</b></h2>
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
                    <form action="./incldes/admin-insert-project.inc.php" method="post">
                        <input type="hidden" name="cid" value="<?php echo $cid ?>" />
                        <input type="hidden" name="wid" value="<?php echo $wid ?>" />
                        <tr>
                            <td> <input type="text" name="status" required> </td>
                            <td> <input type="date" name="sd" required> </td>
                            <td> <input type="date" name="fd" required> </td>
                            <td> <input type="text" name="budget" required> </td>
                            <td> <input type="text" name="address" required> </td>
                            <td style="text-align: center;"> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
    </div>
</body>

</html>