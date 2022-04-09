<!DOCTYPE html>
<html lang="en">
<phpre?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Jusor demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>

<?php
require 'config/config.php';
require 'config/db.php';
require 'pagination/pagination-office.php';

if (isset($_GET['Search'])) {
    $search = $_GET['Search'];
    if (strlen($search) > 0) {

        $query = "SELECT * FROM office
            WHERE name LIKE '%$search%' ORDER BY name";

    } else {
        $query = 'SELECT * from office ORDER BY name LIMIT ' . $page_first_result . ',' . $results_per_page;
    }

// Get Result
    $result = mysqli_query($conn, $query);

// Fetch Data
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);

// Free Result
    mysqli_free_result($result);

// Close Connection
    mysqli_close($conn);
} else {

// Create Query
    $query = 'SELECT * from office ORDER BY name LIMIT ' . $page_first_result . ',' . $results_per_page;

// Get Result
    $result = mysqli_query($conn, $query);

// Fetch Data
    $offices = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($posts);

// Free Result
    mysqli_free_result($result);

// Close Connection
    mysqli_close($conn);
}

?>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">

            <?php include "includes/sidebar.php";?>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include "includes/navbar.php";?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                            <br/>
                            <div class="col-md-12">
                                    <form action="office.php" method="GET">
                                        <input type="text" name="Search" />
                                        <input type="submit" value="Search" class="btn btn-info btn-fill" />
                                    </form>
                                </div>
                            <div class="col-md-12">
                                 <a href="office-add.php">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add New Office</button>
                                </a>
                                </div>

                                <div class="card-header">
                                    <h4 class="card-title">Offices</h4>
                                    <p class="card-category">Here is a subtitle for this table</p>
                                </div>

                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <!-- <th>ID</th> -->
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Postal</th>
                                            <th>Office</th>


                                        </thead>
                                        <tbody>
                                        <?php foreach ($offices as $office): ?>
                                            <tr>

                                                <td><?php echo $office['name']; ?></td>
                                                <td><?php echo $office['contactnum']; ?></td>
                                                <td><?php echo $office['email']; ?></td>
                                                <td><?php echo $office['address']; ?></td>
                                                <td><?php echo $office['city']; ?></td>
                                                <td><?php echo $office['country']; ?></td>
                                                <td><?php echo $office['postal']; ?></td>
                                                <td>
                                                    <a href='edit/office-edit.php?id=<?php echo $office['id']; ?> ' >
                                                    <button type="submit" class="btn btn-warning btn-fill pull-right">Edit</button>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                             <?php
for ($page = 1; $page <= $number_of_page; $page++) {
    echo '<a href = "office.php?page=' . $page . '">' . $page . ' </a>';
}
?>
                        </div>

                    </div>
                </div>
                    </div>
                </div>

            </div>

             </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin  Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google s Plugin    -->
<script type=xt/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartislugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notificons Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control ter for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Botrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
