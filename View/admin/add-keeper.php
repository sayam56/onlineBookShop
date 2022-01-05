<?php
session_start();
$msg="";
$error="";

$con= mysqli_connect('localhost', 'root', '', 'bookdb');
if ((!isset($_SESSION['username'])) || isset($_GET['logout'] )) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login.php");
}
if (isset($_POST['submit_keeper'])) {
                $keeper_name=$_POST['keeper_name'];
                $keeper_email = $_POST['keeper_email'];
                $keeper_phone = $_POST['keeper_phone'];
                $keeper_address = $_POST['keeper_address'];
                $keeper_pass = $_POST['keeper_pass'];
                $status = 1;
                $query = mysqli_query($con, "INSERT INTO users (username, email, password, address, phone, usertype) 
  			  VALUES('$keeper_name', '$keeper_email', '$keeper_pass', '$keeper_address', '$keeper_phone', '2')");
        if ($query) {
             $msg = "Shop Keeper Added ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Online Book Shop | Add Shopkeeper</title>

<!-- App css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.css">
<script src="assets/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<?php include('includes/topheader.php'); ?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php'); ?>
<!-- Left Sidebar End -->

<div class="content-page">
    <!-- Start content -->
<div class="content">
    <div class="container">


<div class="row">
    <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Add Shopkeeper</h4>
            <ol class="breadcrumb p-0 m-0">
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>
                    <a href="#">Shopkeeper </a>
                </li>
                <li class="active">
                    Add Shopkeeper
                </li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Add Shopkeeper </b></h4>
            <hr/>


    <div class="row">
        <div class="col-sm-6">
            <!---Success Message--->
            <?php if ($msg) { ?>
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                </div>
            <?php } ?>

            <!---Error Message--->
            <?php if ($error) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
            <?php } ?>


        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" name="keeper" method="post">


                <div class="form-group">
                    <label class="col-md-2 control-label">Shopkeeper Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value=""
                            name="keeper_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Shopkeeper Email </label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" value=""
                            name="keeper_email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Shopkeeper Phone</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" value=""
                            name="keeper_phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Shopkeeper Address</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" value=""
                            name="keeper_address" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Shopkeeper Password 
                                                       <br>     (1234 Default) </label>
                    <div class="col-md-10">
                    <input type="password" class="form-control" value="1234"
                            name="keeper_pass" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">&nbsp;</label>
                    <div class="col-md-10">

                        <button type="submit"
                                class="btn btn-custom waves-effect waves-light btn-md"
                                name="submit_keeper">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
        </div>


    </div>


                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<?php include('includes/footer.php'); ?>

</div>


</div>
<!-- END wrapper -->


<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
