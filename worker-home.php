<?php
session_start();

include './classes/dbh.php';
include './classes/worker-projects.php';
include './classes/request.classes.php';
include './classes/getusers.class.php';

$id = $_SESSION["workerid"];
$fn = $_SESSION["workerfname"];
$ln = $_SESSION["workerlname"];
$uid = $_SESSION["uid"];
$email = $_SESSION["email"];
$img = $_SESSION["img"];
$area = $_SESSION["area"];
$exp = $_SESSION["exprience"];
$phone = $_SESSION["phone"];


$projects = new worker_projects();
$project = $projects->project($id);
$project2 = $projects->project($id);

$requests = new Request();
$request = $requests->getrequest($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/worker-home.css" />
    <script defer src="./js/worker-home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="worker-header">
        <a href="./worker-home.php" class="logo"><img src="./images/logo.png"> <span class="hide">t</span><span>awakol</span> </a>

        <div class="navigation">
            <div class="edit-mode">
                <h3> Edit mode </h3>
                <input type="checkbox" id="switch" /><label class="switch" for="switch"></label>
            </div>
            <div class="signin">
                <div class="signin-event"> <i class="fa-solid fa-user"></i>
                    <h4><?php echo $ln; ?> </h4>
                </div>
                <div class="signin-dropdown">
                    <header>
                        <div class="signin-close-btn"></div>
                        <i class="fa-solid fa-user"></i>
                        <h4> <?php echo $ln; ?> </h4>
                    </header>
                    <ul>
                        <li onclick="request()"> <i class="fa-solid fa-bell"></i> Request </li>
                        <div class="dropdown">
                            <?php if ($request->rowCount() > 0) {
                                $i = 0;
                                while ($row = $request->fetch()) {
                                    $users = new getusers();
                                    $user = $users->getClient($row['client_ID']);
                            ?>
                                    <h3 class="reqbtn" onclick="reqOpen(<?php echo $i; ?>)" class="header"> <?php echo $user['client_fname'] . ' ' . $user['client_lname']; ?> </h3>
                                    <div class="dropdown-content">
                                        <h3 class="header"> <i onclick="reqBack(<?php echo $i; ?>)" class="fa-solid fa-arrow-left"></i> <?php echo $user['client_fname'] . ' ' . $user['client_lname']; ?> </h3>
                                        <h3> <span class="req-h3">Location:</span> <?php echo $row['location']; ?> </h3>
                                        <h3> <span class="req-h3">Number of rooms :</span> <?php echo $row['no_of_rooms']; ?> </h3>
                                        <h3> <span class="req-h3">Project type:</span> <?php echo $row['room_type']; ?> </h3>
                                        <h3> <span class="req-h3">Special instruction:</span> <?php echo $row['special_instruction']; ?> </h3>
                                        <h3> <span class="req-h3">Start date :</span> <?php echo $row['start_date']; ?> </h3>
                                        <form action="./incldes/response.inc.php" method="post">
                                            <input type="hidden" name="req" value="<?php echo $row['request_id']; ?>" />
                                            <label for="price"> <span class="req-h3">Select estimation price:</span> <input type="text" id="price" name="price" class="project-money" placeholder="Please enter the Project Price.."></label>
                                            <div class="acc-rej">
                                                <input class="accept" type="submit" name="accept" value="accept">
                                                <input class="reject" type="submit" name="reject" value="reject">
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                    $i++;
                                }
                                $request = null;
                            } else {
                                $request = null;
                                ?>
                                <h3> no reqquest yet </h3>
                            <?php } ?>
                        </div>
                        <li> <i class="fa-regular fa-circle-question"></i> <a href=""> Help </a> </li>
                        <li class="signout"> <a href="./incldes/logout.inc.php"> Sign out </a> <i class="fa-solid fa-arrow-right-from-bracket"></i> </li>
                </div>
            </div>
        </div>


    </header>
    <div class="background-img"></div>
    <section>
        <div class="info">
            <div class="info-transform">
                <?php echo '<img id="img1" alt="aaa" src="./uploadImg/' . $img . '"> '; ?>
                <h3><?php echo $fn . " " . $ln; ?></h3>
                <h3>Experiences: <?php echo $exp; ?></h3>
                <h3>Area: <?php echo $area; ?></h3>
                <form action="./incldes/update-worker.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <?php echo '<img id="output" alt="aaa" src="./uploadImg/' . $img . '"> '; ?>
                    <input type="file" name="newimg" accept="image/*" onchange="loadFile(event)" id="img" />

                    <label for="img"> <i class="fa-solid fa-user-pen"></i> </label>
                    <input type="text" name="fname" value="<?php echo $fn; ?>" />
                    <input type="text" name="lname" value="<?php echo $ln; ?>" />
                    <input type="text" name="uid" value="<?php echo $uid; ?>" />
                    <input type="text" name="email" value="<?php echo $email; ?>" />
                    <input type="text" name="phone" value="<?php echo $phone; ?>" />
                    <input type="text" name="area" value="<?php echo $area; ?>" />
                    <input class="submit-reset" type="reset" />
                    <input class="submit-reset" type="submit" name="update" value="update" />
                </form>
                <a onclick="editProfile()" href="#"> Edit Profile </a>
            </div>
        </div>
        <div class="projects-wrapper">
            <div class="projects-header">
                <a id="add-project" href="#"><i class="fa-solid fa-plus"></i> Add Project </a>
                <form id="form" action="./incldes/themes.inc.php" method="post" enctype="multipart/form-data">
                    <div class="wrapper-submit-reset">
                        <input class="submit-reset" type="reset" />
                        <input class="submit-reset" type="submit" name="submit" value="Save" />
                    </div>
                </form>

                <a id="editprojects" href="#"> Edit Projects </a>
            </div>
            <div class="projects">
                <?php
                if ($project->rowCount() > 0) {
                    while ($row = $project->fetch()) {
                ?>
                        <div class="project">
                            <h3> <?php echo $row['theme_title'] ?> </h3>
                            <?php echo '<img alt="aaa" src="./uploadImg/' . $row['theme1'] . '"> '; ?>
                            <a id="edit" href="./edit-project.php?id=<?php echo $row['theme_ID']; ?>"> Edit </a>
                        </div>
                    <?php }
                    $project = null;
                } else {
                    $project = null;

                    ?>
                    <h1> no project yet </h1>
                <?php } ?>
            </div>
        </div>

    </section>


    <div class="popup">
        <div class="popup-header">
            <h2> <?php echo $fn . " " . $ln; ?> </h2>
            <span class="close"></span>
        </div>
        <?php
        if ($project2->rowCount() > 0) {
            while ($row = $project2->fetch()) {
        ?>
                <div class="popup-body">
                    <?php echo '<img alt="aaa" class="active fade" src="./uploadImg/' . $row['theme1'] . '"> '; ?>
                    <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme2'] . '"> '; ?>
                    <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme3'] . '"> '; ?>
                    <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme4'] . '"> '; ?>
                    <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme5'] . '"> '; ?>
                    <a class="prev"> <i class="fa-solid fa-arrow-left"></i> </a>
                    <a class="next"> <i class="fa-solid fa-arrow-right"></i> </a>
                </div>
        <?php  }
            $project2 = null;
        } else {
            $project2 = null;
            echo 'error';
        }
        $row = null;
        ?>
    </div>

</body>

</html>