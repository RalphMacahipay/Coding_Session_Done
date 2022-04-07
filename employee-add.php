<!DOCTYPE html>
<html lang="en">

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
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                
            <?php include("includes/sidebar.php");?>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include("includes/navbar.php");?>
            <!-- End Navbar -->
            <?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$office_id = mysqli_real_escape_string($conn,$_POST['office']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
		

		$query = "INSERT INTO employee(lastname, firstname, office_id, address) 
                    VALUES('$lastname', '$firstname', '$office_id', '$address')";

		if(mysqli_query($conn, $query)){
            // header('Location: '/office.php'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>
            <div class="content">
            <div class="container-fluid">
                    <div class="section">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Employee</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input name="lastname" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input name="firstname" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Office</label>
                                                    <!-- <input name="email" type="email" class="form-control" placeholder="Email"> -->
                                                    <select class="form-control" name='office'>
                                                    <option>Select....</option>
                                                    <?php
                                                        $query = "SELECT id, name FROM office";
                                                        $result = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_array($result)){
                                                            echo "<option value=" . $row['id'] . ">" . $row['name'] . '</option>';
                                                        }
                                                    ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address / Building</label>
                                                    <input name="address" type="text" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        </div>
                                        
                                        <button type="submit" name="submit" value="Submit" class="btn btn-info btn-fill pull-right">Save Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
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
