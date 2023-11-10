<?php
session_start();
$id = $_GET["id"];

include './classes/dbh.php';
include './classes/get-project.class.php';

$themes = new getThemes();
$theme = $themes->getTheme($id);
$row = $theme;
$_SESSION['theme1'] = $row[2];
$_SESSION['theme2'] = $row[3];
$_SESSION['theme3'] = $row[4];
$_SESSION['theme4'] = $row[5];
$_SESSION['theme5'] = $row[6];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/edit-project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <h1> Edit project </h1>
    <form class="update-form" action="./incldes/update-project.inc.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
            <input type="text" name="title" value="<?php echo $row[1]; ?>" />
        </div>
        <div class="row-grid">
            <div class="wrapper">
                <?php echo '<img id="output1" alt="aaa" src="./uploadImg/' . $row[2] . '"> '; ?>
                <input type="file" name="theme1" accept="image/*" onchange="loadFile(event,1)" id="theme1" />
                <label for="theme1"> <i class="fa-solid fa-user-pen"></i> </label>
            </div>
            <div class="wrapper">
                <?php echo '<img id="output2" alt="aaa" src="./uploadImg/' . $row[3] . '"> '; ?>
                <input type="file" name="theme2" accept="image/*" onchange="loadFile(event,2)" id="theme2" />
                <label for="theme2"> <i class="fa-solid fa-user-pen"></i> </label>
            </div>
            <div class="wrapper">
                <?php echo '<img id="output3" alt="aaa" src="./uploadImg/' . $row[4] . '"> '; ?>
                <input type="file" name="theme3" accept="image/*" onchange="loadFile(event,3)" id="theme3" />
                <label for="theme3"> <i class="fa-solid fa-user-pen"></i> </label>
            </div>
            <div class="wrapper">
                <?php echo '<img id="output4" alt="aaa" src="./uploadImg/' . $row[5] . '"> '; ?>
                <input type="file" name="theme4" accept="image/*" onchange="loadFile(event,4)" id="theme4" />
                <label for="theme4"> <i class="fa-solid fa-user-pen"></i> </label>
            </div>
            <div class="wrapper">
                <?php echo '<img id="output5" alt="aaa" src="./uploadImg/' . $row[6] . '"> '; ?>
                <input type="file" name="theme5" accept="image/*" onchange="loadFile(event,5)" id="theme5" />
                <label for="theme5"> <i class="fa-solid fa-user-pen"></i> </label>
            </div>
        </div>
        <input class="submit-reset" type="submit" name="update" value="update" />
    </form>
    <div class="delete">
        <h1> Delete project </h1>
        <form action="./incldes/delete-project.inc.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
        <button class="deletebtn" type="submit" name="delete"> <i class='fa-solid fa-minus'></i></button>
        </form>
    </div>

        <?php $row = null;?>
    <script>
        var loadFile = function(event, index) {
            var output = document.getElementById("output" + index);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            };
        };
    </script>

</body>

</html>