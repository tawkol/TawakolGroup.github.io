<?php
session_start();
include './classes/dbh.php';
include './classes/admin.class.php';

if (isset($_GET['projectId'])) {
    $pid = $_GET['projectId'];
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
    <title>Add design</title>
</head>

<body>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2>Insert into <b>Design</b></h2>
            </div>
            <table class="insrt_project">
                <thead>
                    <tr>
                        <th> Item name </th>
                        <th>Design type</th>
                        <th> Description </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="./incldes/insert-desgin.inc.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                        <tr>
                            <td>
                                <div class="file-input-wrapper">
                                    <input accept="image/*" type="file" name="img" id="Your-design" required>
                                    <label for="Your-design">Upload a design</label>
                                    <div class="file-name">No file selected</div>
                                </div>
                            </td>
                            <td> <input type="text" name="design_type" required> </td>
                            <td> <input type="text" name="design_description" required> </td>
                            <td style="text-align: center;"> <button class="confirm" title="confirm" type='submit' name='confirm' value='confirm'><i class="fa-solid fa-check"></i></button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    <script src="./js/request.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Your-design').change(function() {
                var fileName = $(this).val().split('\\').pop();
                if (fileName) {
                    $(this).siblings('.file-name').text('Uploaded: ' + fileName);
                } else {
                    $(this).siblings('.file-name').text('No file selected');
                }
            });
        });
    </script>
</body>

</html>