<?php
session_start();
include './classes/dbh.php';
include './classes/admin.class.php';

$suppliers = new admin();
$supplier = $suppliers->allsuppliers();
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
    <title>Suppliers</title>
</head>

<body>
    <div class="form__dropdown">
        <form id="dropdown__form" action="./incldes/add-suppliers.php" method="post">
            <div class="close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <label for="name">Supplier name:</label>
            <input type="text" name="name" id="name" required>
            <label for="type">Type: </label>
            <input type="text" name="type" id="type" required>
            <label for="address">Address: </label>
            <input type="text" name="address" id="address" required>
            <div class="asave__reset">
                <input class="save__reset" title="save" type='submit' name='save' value='save'>
                <input class="save__reset" title="reset" type='reset' name='reset' value='reset'>
            </div>
        </form>
    </div>
    <?php include './sidebar-admin.php'; ?>
    <main>
        <div class="table__wrapper">
            <div class="table__header">
                <h2> Manage <b>Suppliers</b></h2>
                <button type="button" class="add-new"><i class="fa fa-plus"></i> Add New</button>
            </div>
            <table id="table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> name</th>
                        <th> type</th>
                        <th>address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($supplier->rowCount() > 0) {
                        while ($row = $supplier->fetch()) {
                    ?>
                            <tr>
                                <td><?php echo $row['supplier_name']; ?></td>
                                <td><?php echo $row['supplier_type']; ?></td>
                                <td><?php echo $row['supplier_address']; ?></td>
                                <td class="actions">
                                    <a href="./update-supplier.php?id=<?php echo $row['supplier_ID']; ?>" class="edit" title="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="./incldes/delete-suppliers.inc.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['supplier_ID']; ?>" />
                                        <button class="delete" title="Delete" type='submit' name='delete' value='delete'><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        $supplier = null;
                        $row = null;
                    } else { 
                        $supplier = null;
                        $row = null;
                        ?>
                        <tr>
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

        const formDropdown = document.querySelector('.form__dropdown');
        const form = document.querySelector('#dropdown__form');
        const addNew = document.querySelector('.add-new');

        document.onclick = function(e) {
            if (e.target.id !== "dropdown__form") {
                form.classList.remove("active");
                formDropdown.classList.add("fade-out");
                setTimeout(() => {
                    formDropdown.classList.remove("fade-out");
                }, 300);
                formDropdown.classList.remove('active');
            }
        };

        addNew.addEventListener('click', () => {
            formDropdown.classList.add('active');
            setTimeout(() => {
                form.classList.add("active");
            }, 100);
        });
        const btnClose = document.querySelector('.close');
        btnClose.addEventListener('click', () => {
            form.classList.remove("active");
            formDropdown.classList.add("fade-out");
            setTimeout(() => {
                formDropdown.classList.remove("fade-out");
            }, 300);
            formDropdown.classList.remove('active');
        });
    </script>
    </div>
</body>

</html>