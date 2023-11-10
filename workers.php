<?php
include './nav.php';
include './classes/workers.class.php';
$workers = new workers();
$worker = $workers->worker();
?>
<link rel="stylesheet" href="./css/workers.css">
<div class="background-img"></div>
<section class="workers">
    <header>
        <nav class="worker-nav">
            <ul>
                <li class="filter-active"><a href="./workers.php"> All </a></li>
                <li><a href="./Contractor.php">Contractor</a></li>
                <li><a href="./Interior-design.php">Interior design</a></li>
                <li><a href="./Plumber.php"> Plumber </a></li>
                <li><a href="./Electrician.php"> Electrician</a></li>
                <li><a href="./Painter.php"> Painter </a></li>
            </ul>
        </nav>
    </header>
    <div class="worker-wrapper">
        <?php
        if ($worker->rowCount() > 0) {
            while ($row = $worker->fetch()) {
        ?>
                <div class="worker-card">
                    <div class="transform">
                        <div class="profile-img"> <?php echo '<img src="./uploadImg/' . $row['profile_img'] . '"> '; ?>
                        </div>
                        <div class="profile-description">
                            <header class="card-header">
                                <div class="profile-name">
                                    <h1> <?php echo $row["worker_fname"] . ' ' . $row["worker_lname"]; ?> </h1>
                                </div>
                            </header>
                            <article class="card-article">
                                <h3> Profession: <?php echo $row['profession']; ?> </h3>
                                <h3> Experance: <?php echo $row['exprience']; ?> </h3>
                                <h3> Area: <?php echo $row['area']; ?> </h3>
                            </article>
                            <footer class="buttons">
                                <a href="./worker.php?id=<?php echo $row['worker_ID']; ?>"> View all </a>
                                <a href="./request.php?id=<?php echo $row['worker_ID']; ?>"> Request </a>
                            </footer>
                        </div>
                    </div>
                </div>

        <?php
            }
            $worker = null;
        } else {
            echo " <h3 class='no-workers'> no workers yet </h3>";
            $worker = null;
        }
        $row = null;
        ?>
    </div>
</section>






<?php
include './footer.php';
?>