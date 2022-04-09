<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Jusor demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
<?php
    require('../config/config.php');
    require('../config/db.php');

    $id =$_GET['id'];

 
    $query= "SELECT * from office where id=".$id;
   

    $result = mysqli_query($conn, $query);
    

    if(isset($result)){
        $office = mysqli_fetch_array($result);
		$name = $office['name'];
		$contactnum = $office['contactnum'];
		$email = $office['email'];
		$address = $office['address'];
        $city = $office['city'];
        $country = $office['country'];
        $postal = $office['postal'];
        

    }


    ?>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                
            <?php include("sidebar-edit.php");?>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <?php include("navbar-edit.php");?>
            <!-- End Navbar -->
    <?php


	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$contactnum = mysqli_real_escape_string($conn,$_POST['contactnum']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $postal = mysqli_real_escape_string($conn,$_POST['postal']);
		

		$query = "UPDATE office SET name='$name', contactnum='$contactnum', email='$email',
                 address='$address',city='$city',country='$country',postal='$postal' 
                 WHERE id=" . $id;
                    

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
                                    <h4 class="card-title">Office Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Office Name</label>
                                                    <input name="name" type="text" class="form-control" placeholder="Company" value="<?php echo $name; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input name="contactnum" type="text" class="form-control" placeholder="Username" value="<?php echo $contactnum; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address / Building</label>
                                                    <input name="address" type="text" class="form-control" value="<?php echo $address; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input name="city" type="text" class="form-control" placeholder="City" value="<?php echo $city; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input name="country" type="text" class="form-control" placeholder="Country"value="<?php echo $country; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input name="postal" type="number" class="form-control" placeholder="ZIP Code" value="<?php echo $postal; ?>">
                                                </div>
                                            </div>
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
  
 -->
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin  Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google s Plugin    -->
<script type=xt/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartislugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notificons Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control ter for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Botrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
