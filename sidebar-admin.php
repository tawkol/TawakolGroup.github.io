<?php
$username = $_SESSION["uid"];
$firstName = $_SESSION["fn"];
$lastName = $_SESSION["ln"];
$email = $_SESSION["email"];
$role = $_SESSION["role"];
$colors = ['red', 'green', 'blue'];
$n = $_SESSION['randNum'];

function initials($x, $y)
{
    $fn = substr($x, 0, 1);
    $ln = substr($y, 0, 1);
    $i = $fn . $ln;
    return $i;
}
?>
<header class="main-header">
    <div class="start">
        <i class="fa-solid fa-bars toggle__sidebar"></i>
        <a href="./admin.php" class="logo">
            <img src="./images/logo.png">
            <span class="hide">t</span><span>awakol</span>
        </a>
    </div>

    <div class="end">
        <div id="profile" class="profile <?php echo $colors[$n] ?> ">
            <?php echo initials($firstName, $lastName); ?>
        </div>
        <div class="profile__dropdown" id="profile__dropdown">
            <div class="head">
                <div class="profile <?php echo $colors[$n] ?>">
                    <?php echo initials($firstName, $lastName); ?>
                </div>
                <div class="profile__info">
                    <span class="profile__name">
                        <?php echo $firstName . " " . $lastName; ?>
                    </span>
                    <span><?php echo $username; ?></span>
                    <span class="profile__email"><?php echo $email; ?></span>
                </div>
            </div>
            <a href=""> <i class="fa-solid fa-clipboard-user"></i> manage account</a>
            <?php
            if ($role == 'admin') { ?>
                <a href="#"> <i class="fa-solid fa-users-rectangle"></i> manage users </a>
            <?php } ?>
            <a href=""> <i class="fa-solid fa-gear"></i> settings</a>
            <a href="./incldes/logout.inc.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                sign out
            </a>
        </div>
    </div>
</header>

<div class="main__wrapper">
    <nav class="sidebar">
        <ul>
            <li><a title="Dashboard" href="./admin.php"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span> </a></li>
            <li><a title="Appointments" href="./appointments.php"> <i class="fa-solid fa-calendar-check"></i> <span>appointments</span> </a></li>
            <li><a title="Projects" href="./projects.php"><i class="fa-solid fa-chart-simple"></i> <span>Projects</span> </a></li>
            <li><a title="Suppliers" href="./suppliers.php"> <i class="fa-solid fa-truck-field"></i> <span>Suppliers</span> </a></li>
            <li><a title="Clients" href="./registered-clients.php"> <i class="fa-solid fa-user"></i> <span> Clients</span> </a></li>
            <li><a title="Workers" href="./registered-workers.php"> <i class="fa-solid fa-person-digging"></i> <span> Workers</span> </a></li>
        </ul>
    </nav>

    <!-- small_screen_sidebar -->

    <div class="small_screen_sidebar">
        <div class="start">
            <i class="fa-solid fa-bars close__sidebar"></i>
            <a href="./admin.php" class="logo">
                <img src="./images/logo.png">
                <span class="hide">t</span><span>awakol</span>
            </a>
        </div>
        <nav class="big">
            <ul>
                <li><a title="Dashboard" href="./admin.php"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span> </a></li>
                <li><a title="Appointments" href="./appointments.php"> <i class="fa-solid fa-calendar-check"></i> <span>appointments</span> </a></li>
                <li><a title="Projects" href="./projects.php"><i class="fa-solid fa-chart-simple"></i> <span>Projects</span> </a></li>
                <li><a title="Suppliers" href="./suppliers.php"> <i class="fa-solid fa-truck-field"></i> <span>Suppliers</span> </a></li>
                <li><a title="Clients" href="./registered-clients.php"> <i class="fa-solid fa-user"></i> <span> Clients</span> </a></li>
                <li><a title="Workers" href="./registered-workers.php"> <i class="fa-solid fa-person-digging"></i> <span> Workers</span> </a></li>
            </ul>
        </nav>
    </div>

    <div class="black__shadow"></div>