<?php
session_start();
include './classes/dbh.php';
include './classes/request.classes.php';
include './classes/getusers.class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header id="nav" class="main-header">
        <a href="./index.php" class="logo"><img src="./images/logo.png"> <span class="hide">t</span><span>awakol</span> </a>
        <nav class="navigation">
            <ul class="navigation-items">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li class="services-position">
                    <a href="./service.php"> Services </a> <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span>
                    <ul class="services-dropdown">
                        <li><a href="./contractor.php"> Finishing </a></li>
                        <li><a href="./workers.php"> renovation </a></li>
                        <li><a href="./Interior-design.php"> Interior design </a></li>
                    </ul>
                </li>
                <li><a href="./gallery.php">Gallery</a></li>
                <li><a href="./workers.php">Workers</a></li>
                <li><a href="./allsuppliers.php">Suppliers</a></li>
            </ul>
        </nav>
        <div class="user">
            <div class="signin">
                <?php
                if (isset($_SESSION["userid"])) {
                    $requests = new Request();
                    $request = $requests->getresponse($_SESSION["userid"]);
                ?>
                    <div class="signin-event"> <i class="fa-solid fa-user"></i>
                        <h4><?php echo $_SESSION["useruid"]; ?> </h4>
                    </div>
                    <div class="signin-dropdown">
                        <header>
                            <div class="signin-close-btn"></div>
                            <i class="fa-solid fa-user"></i>
                            <h4> <?php echo $_SESSION["useruid"]; ?> </h4>
                        </header>
                        <ul>
                            <li onclick="request()"> <i class="fa-solid fa-bell"></i> Response </li>
                            <div class="dropdown">
                                <?php if ($request->rowCount() > 0) {
                                    $i = 0;
                                    while ($row = $request->fetch()) {
                                        $workers = new getusers();
                                        $worker = $workers->getWorker($row['worker_id']);
                                ?>
                                        <h3 class="reqbtn" onclick="reqOpen(<?php echo $i; ?>)" class="header"> <?php echo $worker['worker_fname'] . ' ' . $worker['worker_lname']; ?> </h3>
                                        <div class="dropdown-content">
                                            <h3 class="header"> <i onclick="reqBack(<?php echo $i; ?>)" class="fa-solid fa-arrow-left"></i><?php echo $worker['worker_fname'] . ' ' . $worker['worker_lname']; ?> </h3>
                                            <h3> <span class="req-h3"> Estimation price:</span> <?php echo $row['price']; ?> </h3>
                                            <form action="./incldes/client_response.inc.php" method="post">
                                                <input type="hidden" name="req" value="<?php echo $row['request_id']; ?>" />
                                                <label for="date">
                                                    Selecte appointment:
                                                    <input class="date" type="date" name="appointment" />
                                                </label>
                                                <div class="acc-rej">
                                                    <input class="accept" type="submit" name="accept" value="accept">
                                                    <input class="reject" type="submit" name="reject" value="reject">
                                                </div>
                                            </form>
                                        </div>
                                    <?php }
                                    $request = null;
                                    $worker = null;
                                } else {
                                    $request = null;
                                    $worker = null;
                                    ?>
                                    <h3> no reqquest yet </h3>
                                <?php } ?>
                            </div>

                            <li> <i class="fa-regular fa-circle-question"></i> <a href=""> Help </a> </li>
                            <li class="signout"> <a href="./incldes/logout.inc.php"> Sign out </a> <i class="fa-solid fa-arrow-right-from-bracket"></i> </li>
                    </div>
            </div>
        <?php
                    $row = null;
                } else {
        ?>
            <div class="signin-event"> <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <h4> Sign in </h4>
            </div>
            <div class="signin-dropdown">
                <header>
                    <div class="signin-close-btn"></div>
                    <i class="fa-solid fa-face-grin-wide"></i>
                    <h4> Welcome Back! </h4>
                </header>
                <form action="./incldes/login.inc.php" method="post">
                    <div class="input-text">
                        <input type="text" name="username" required="username">
                        <label for="username">Username</label>
                        <span></span>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-text">
                        <input id="pass" type="password" name="password" required="password">
                        <label for="Password">password</label>
                        <span></span>
                        <i id="pass-icon" class="fa-solid fa-eye-slash" onclick="pass()"></i>
                    </div>

                    <div class="remember-forgot">
                        <label><input type="checkbox">
                            Remember me</label>
                        <a href="#"> Forgot Password? </a>
                    </div>
                    <div class="remember-forgot">
                        <a href="./worker-sign.php"> Switch to worker </a>
                        <a href="./admin-sign.php"> Switch to admin </a>
                    </div>

                    <div class="signin-btn">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i><input type="submit" value="Sign in" name="submit">
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    <a class="register" href="./register.php"> Register </a>
    <div class="menu-btn"></div>
    </div>
    </header>