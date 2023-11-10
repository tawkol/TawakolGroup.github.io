<?php
session_start();
include './classes/dbh.php';
include './classes/admin.class.php';

$admin = new admin();
if (isset($_GET['id'])) {
    $sid = $_GET['id'];
    $design = $admin->selectDesignID($sid);
    $row = $design->fetch();
    $_SESSION['oldimg'] = $row['upload_design'];
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
    <title> Update design </title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Update <b>design</b></h2>
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
                    <form action="./incldes/update-design.inc.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['design_ID'] ?>" />
                        <tr>
                            <td>
                                <?php echo '<img id="output" alt="aaa" src="./uploadImg/' . $row['upload_design'] . '"> '; ?>
                                <input type="file" name="newimg" accept="image/*" onchange="loadFile(event)" id="img" />
                                <label for="img"> <i class="fa-solid fa-user-pen"></i>
                                </label>
                            </td>
                            <td> <input type="text" name="type" value="<?php echo $row['design_type']; ?>"> </td>
                            <td> <input type="text" name="description" value="<?php echo $row['design_description']; ?>"> </td>
                            <td> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button> </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById("output");
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src);
                };
            };
        </script>
</div>
<?php
 $row = null; 
 $design = null; 
?>

</body>

</html>