<?php
session_start();
include './classes/dbh.php';
include './classes/request.classes.php';
include './classes/admin.class.php';
include './classes/getusers.class.php';
include './classes/charts.class.php';

$admin = new admin();
$reqs = new Request();
$users = new getusers();
$charts = new charts();

$clients = $users->Recentusers();
$workers = $users->Topworker();

$paymentYears = $charts->paymentYears();

$req =  $reqs->getall();
$appnum = $req->rowCount();

$address = $charts->addressProject();
if ($address->rowCount() > 0) {
    while ($row = $address->fetch()) {
        $projectaddress[] = $row['project_address'];
        $num[] = $row['n'];
    }
}
$suppliers = $admin->allsuppliers();
$supplier = $suppliers->rowCount();
$projects = $admin->allprojects();
$project = $projects->rowCount();
$projecLimit = $admin->projectsHomeSec();

if (isset($_SESSION["uid"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Dashboard</title>
        <script src="./js/admin.js" defer></script>
    </head>

    <body>
        <?php include './sidebar-admin.php'; ?>
        <main class="home">
            <div class="wrapper">
                <div class="wrapper__middle">
                    <div class="progress">
                        <div class="card red">
                            <div class="row-progress">
                                <header>
                                    <h4> <?php echo $appnum; ?> </h4>
                                    <h4> Appointments</h4>
                                </header>
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <footer>
                                <a href="./appointments.php"> Manage <i class="fa-solid fa-arrow-right"></i> </a>
                            </footer>
                        </div>
                        <div class="card green">
                            <div class="row-progress">
                                <header>
                                    <h4> <?php echo  $supplier; ?> </h4>
                                    <h4> Suppliers</h4>
                                </header>
                                <i class="fa-solid fa-truck-field"></i>
                            </div>
                            <footer>
                                <a href="./suppliers.php"> Manage <i class="fa-solid fa-arrow-right"></i> </a>
                            </footer>
                        </div>
                        <div class="card blue">
                            <div class="row-progress">
                                <header>
                                    <h4> <?php echo $project; ?> </h4>
                                    <h4> Projects</h4>
                                </header>
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                            <footer>
                                <a href="./projects.php"> Manage <i class="fa-solid fa-arrow-right"></i> </a>
                            </footer>
                        </div>
                    </div>
                    <div class="chart__wrapper">
                        <div class="chart__header">
                            <h2> payments per year </h2>
                            <form id="selectForm">
                                <label for="days"> day: </label>
                                <select id="days" title="days" name="days">
                                    <option value=""> none</option>
                                    <option value="all"> All days</option>
                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i; ?> "> <?php echo $i; ?> </option>
                                    <?php    } ?>
                                </select>
                                <label for="months"> month: </label>
                                <select id="months" title="months" name="months">
                                    <option value=""> none</option>
                                    <option selected value="all"> All months </option>
                                    <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?php echo $i; ?> "> <?php echo $i; ?> </option>
                                    <?php    } ?>
                                </select>
                                <label for="years"> years: </label>
                                <select id="years" title="years" name="years">
                                    <option value="all"> All </option>
                                    <?php
                                    if ($paymentYears->rowCount() > 0) {
                                        while ($row = $paymentYears->fetch()) {
                                            if ($row['date'] == date('Y')) {
                                                $year = $row['date'];
                                    ?>
                                                <option selected value="<?php echo $row['date'] ?> "> <?php echo $row['date'] ?> </option>
                                            <?php } else { ?>
                                                <option value="<?php echo $row['date'] ?> "> <?php echo $row['date'] ?> </option>
                                        <?php  }
                                        }
                                    } else { ?>
                                        <option selected value=""> no data yet </option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                        <?php
                        $paymentsPerYear = $charts->paymentsPerYear($year);
                        if ($paymentsPerYear->rowCount() > 0) {
                            while ($row = $paymentsPerYear->fetch()) {
                                $PerYear[] = $row['date'];
                                $sumPerYear[] = $row['sum'];
                            }
                        } ?>
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="wrapper__side">
                    <div class="recent__clients">
                        <div class="table__header">
                            <h2>Recent Clients</h2>
                            <a href="./registered-clients.php"> View all </a>
                        </div>
                        <ul>
                            <?php
                            if ($clients->rowCount() > 0) {
                                while ($row = $clients->fetch()) {
                            ?>
                                    <li>
                                        <div class="avatar <?php echo $colors[$n] ?>">
                                            <?php echo initials($row["client_fname"], $row["client_lname"]); ?>
                                        </div>
                                        <div class="avatar__info">
                                            <span><?php echo $row["client_fname"] . " " . $row["client_lname"]; ?></span>
                                            <span class="profile__email"> <?php echo $row["email"]; ?> </span>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                    <div class="top__workers">
                        <div class="table__header">
                            <h2>Top Workers</h2>
                            <a href="./registered-workers.php"> View all </a>
                        </div>
                        <ul>
                            <?php
                            if ($workers->rowCount() > 0) {
                                while ($row = $workers->fetch()) {
                            ?>
                                    <li>
                                        <div class="avatar <?php echo $colors[$n] ?>">
                                            <?php echo initials($row["worker_fname"], $row["worker_lname"]); ?>
                                        </div>
                                        <div class="avatar__info">
                                            <span><?php echo $row["worker_fname"] . " " . $row["worker_lname"]; ?></span>
                                            <span class="profile__email"> <?php echo $row["email"]; ?> </span>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="wrapper__middle">
                    <?php
                    if ($projecLimit->rowCount() > 0) {
                    ?>
                        <div class="table__wrapper">
                            <div class="table__header">
                                <h2>Projects</h2>
                                <a href="./projects.php"> View all </a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td><b> Worker name </b></td>
                                        <td><b> Finish date </b></td>
                                        <td><b> Project budget </b></td>
                                        <td><b> Status </b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $projecLimit->fetch()) {
                                        $worker = $users->getWorker($row['worker_ID']);
                                    ?>
                                        <tr onclick="window.location='./project.php?projectId=<?php echo $row['project_ID']; ?>';">
                                            <td> <?php echo $worker['worker_fname'] . ' ' .  $worker['worker_lname']; ?> </td>
                                            <td><?php echo $row['finish_date']; ?></td>
                                            <td><?php echo 'E£ ' . $row['project_budget'];  ?></td>
                                            <td><span class="status <?php echo $row['status'] == 'starting' ? 'starting' : ($row['status'] == 'in progress' ? 'in_progress' : 'pending'); ?>"> <?php echo $row['status']; ?> </span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>


                </div>

                <div class="wrapper__side">
                    <div class="chart__wrapper">
                        <div id="pie"></div>
                    </div>
                </div>
            </div>
        </main>
        </div>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            let dataArrayJS = <?php echo json_encode($PerYear); ?>;
            let priceArrayJS = <?php echo json_encode($sumPerYear); ?>;
            var options = {
                series: [{
                    data: priceArrayJS
                }],
                chart: {
                    height: 300,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {}
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '35%',
                        distributed: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: dataArrayJS,
                    labels: {
                        style: {
                            fontSize: '8px'
                        }
                    }
                },
                noData: {
                    text: 'Loading...'
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();


            const yearSelectMenu = document.querySelector("#years");
            const monthSelectMenu = document.querySelector("#months");
            const daySelectMenu = document.querySelector("#days");
            $("#selectForm").change(function() {
                let month = monthSelectMenu.value;
                let year = yearSelectMenu.value;
                let day = daySelectMenu.value;
                let http = new XMLHttpRequest();
                http.onload = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let response = JSON.parse(this.responseText);
                        let newDateArray = [];
                        let newSumArray = [];
                        for (let item of response) {
                            newDateArray.push(item.date);
                            newSumArray.push(item.sum);
                        }
                        chart.updateOptions({
                            series: [{
                                data: newSumArray
                            }],
                            xaxis: {
                                categories: newDateArray,
                            }
                        });
                    }
                };
                http.open("POST", "./incldes/chart.inc.php");
                http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                http.send(`year=${year}&month=${month}&day=${day}`);
            });

            if (window.innerWidth <= "500") {
                chart.updateOptions({
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    }
                });
            }

            window.addEventListener('resize', function() {
                if (window.innerWidth <= "500") {
                    chart.updateOptions({
                        plotOptions: {
                            bar: {
                                horizontal: true
                            }
                        }
                    });
                } else {
                    chart.updateOptions({
                        plotOptions: {
                            bar: {
                                horizontal: false
                            }
                        }
                    });
                }
            });
            var pieOptions = {
                series: <?php echo json_encode($num); ?>,
                chart: {
                    width: '100%',
                    type: 'pie',
                },
                labels: <?php echo json_encode($projectaddress); ?>,
                title: {
                    text: 'projects areas'
                },
                dataLabels: {
                    style: {
                        fontSize: '9px'
                    },
                    formatter(val, opts) {
                        const name = opts.w.globals.labels[opts.seriesIndex]
                        return [name, val.toFixed(1) + '%']
                    }
                },
                legend: {
                    show: false
                },


                responsive: [{
                    breakpoint: 400,
                    pieOptions: {
                        chart: {
                            width: 100
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var pie = new ApexCharts(document.querySelector("#pie"), pieOptions);
            pie.render();
        </script>
        <?php
        $row = null;
        $suppliers = null;
        $supplier = null;
        $projects = null;
        $project = null;
        $projecLimit = null;
        $clients = null;
        $workers = null;
        $paymentYears = null;
        $req = null;
        $appnum = null;
        $address =null;
        ?>
    </body>

    </html>
<?php
}
?>