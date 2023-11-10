<?php
$id = $_GET['id'];
include './nav.php';
include './classes/worker.class.php';

$worker = new Worker();
$worker_info = $worker->workerInfo($id);
$worker_project = $worker->workerProject($id);
$worker_project2 = $worker->workerProject($id);

$info = $worker_info->fetch();
?>
<link rel="stylesheet" href="./css/worker.css">
<div class="background-img"></div>
<section>
    <div class="info">
        <div class="info-transform">
            <?php echo '<img id="img1" alt="aaa" src="./uploadImg/' . $info['profile_img'] . '"> '; ?>
            <h3><?php echo $info["worker_fname"] . ' ' . $info["worker_lname"]; ?></h3>
            <h3> Experance: <?php echo $info['profession']; ?> </h3>
            <h3> Experance: <?php echo $info['exprience']; ?> </h3>
            <h3> Area: <?php echo $info['area']; ?> </h3>
            <a href="./request.php?id=<?php echo $info['worker_ID']; ?>"> Request <i class="fa-solid fa-arrow-right"></i> </a>

        </div>
    </div>
    <div class="projects-wrapper">
        <div class="projects">
            <?php
            if ($worker_project->rowCount() > 0) {
                while ($row = $worker_project->fetch()) {
            ?>
                    <div class="project">
                        <h3> <?php echo $row['theme_title'] ?> </h3>
                        <?php echo '<img alt="aaa" src="./uploadImg/' . $row['theme1'] . '"> '; ?>
                    </div>
                <?php }
            } else { ?>
                <h1> no project yet </h1>
            <?php } ?>
        </div>
    </div>

</section>


<div class="popup">
    <div class="popup-header">
        <h2> <?php echo $info["worker_fname"] . ' ' . $info["worker_lname"]; ?> </h2>
        <span class="close"></span>
    </div>
    <?php
    if ($worker_project->rowCount() > 0) {
        while ($row = $worker_project2->fetch()) {
    ?>
            <div class="popup-body">
                <?php echo '<img alt="aaa" class="active fade" src="./uploadImg/' . $row['theme1'] . '">  '; ?>
                <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme2'] . '">  '; ?>
                <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme3'] . '">  '; ?>
                <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme4'] . '">  '; ?>
                <?php echo '<img alt="aaa" class="fade" src="./uploadImg/' . $row['theme5'] . '">  '; ?>
                <a class="prev"> <i class="fa-solid fa-arrow-left"></i> </a>
                <a class="next"> <i class="fa-solid fa-arrow-right"></i> </a>
            </div>
    <?php  }
        $worker_project = null;
        $worker_project2 = null;
    } else {
        $worker_project = null;
        $worker_project2 = null;
        echo 'error';
    }
    $worker_info = null;
    $info = null;
    $row = null;
    ?>
</div>
<script src="./js/worker.js"></script>

</body>

</html>