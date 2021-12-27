<?php 
session_start();

include('../Model/connect.php');
$productCount = 0;

//o by default means not logged in, 1 means logged in
$is_loggedIn = 0;
$username = '';
$user_id = '';
$cartCount = 0;
$notiCount = 0;

if ((isset($_SESSION['user_id']))) {
    $user_id = $_SESSION['user_id'];
}


//check if logged in
if (isset($_SESSION['username'])) {
    $is_loggedIn = 1;
    $username = $_SESSION['username'];

    //checkNotifications
    // try {
    //     $sql = "SELECT * FROM `notifications` WHERE user_id='" . $user_id . "' AND seen='0' ";
    //     $object = $conn->query($sql);
    //     $notiCount = $object->rowCount();
    // } catch (PDOException $e) {
    //     echo $e;
    // }
}

include('../Controllers/cartUpdater.php');


?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Book Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- hamburger Begin -->
    <?php include('hamburger.php') ?>
    <!-- hamburger End -->


    <?php include('Header.php') ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section" style="background-image: url('../Assets/img/breadcrumb.png'); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Online Book Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
            <?php include('category.php') ?>
            
                <div class="col-lg-9 col-md-7">

                    <?php
                    //getting the products

                    if(isset($_GET['cat'])){
                        $cat=$_GET['cat'];
                        try {
                            $prsql = "SELECT * FROM product where categories_id='".$cat."'";
                            $prObj = $conn->query($prsql);
                        ?>
    
                            <div class="filter__item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <!-- <div class="filter__sort">
                                                    <span>Sort By</span>
                                                    <select>
                                                        <option value="0">Default</option>
                                                        <option value="0">Default</option>
                                                    </select>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
    
                                <?php
                                $prTab = $prObj->fetchAll();
                                foreach ($prTab as $key) {
                                ?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product__item">
                                            <div class="product__item__pic" style="background-image: url('<?php echo $key[5] ?>'); background-repeat: no-repeat; background-size:contain; background-position:center;" >
                                            
                                                <ul class="product__item__pic__hover">
                                                    <li>
                                                        <!-- <button ></button> -->
                                                        <a style="cursor: pointer;" onclick="promtLogin(<?php echo $key[0] ?>, <?php echo $key[3] ?>);"><i class="fa fa-shopping-cart" style="margin-top: 0px;"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__item__text">
                                                <h6><a class="productName" onclick="redirectToProductDetails(<?php echo $key[0] ?>);" ><?php echo $key[2] ?></a></h6>
                                                <h5>$<?php echo $key[3] ?></h5>
                                            </div>
                                        </div>
                                    </div>
    
                            <?php
                                    $productCount++;
                                }
                            } catch (PDOException $e) {
                                echo "<script>console.log('product fetch error');</script>";
                            }

                    }
                    else{
                        try {
                            $prsql = "SELECT * FROM product ";
                            $prObj = $conn->query($prsql);
                        ?>
    
                            <div class="filter__item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <!-- <div class="filter__sort">
                                                    <span>Sort By</span>
                                                    <select>
                                                        <option value="0">Default</option>
                                                        <option value="0">Default</option>
                                                    </select>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
    
                                <?php
                                $prTab = $prObj->fetchAll();
                                foreach ($prTab as $key) {
                                ?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="product__item">
                                            <div class="product__item__pic" style="background-image: url('<?php echo $key[5] ?>'); background-repeat: no-repeat; background-size:contain; background-position:center;" >
                                            
                                                <ul class="product__item__pic__hover">
                                                    <li>
                                                        <!-- <button ></button> -->
                                                        <a style="cursor: pointer;" onclick="promtLogin(<?php echo $key[0] ?>, <?php echo $key[3] ?>);"><i class="fa fa-shopping-cart" style="margin-top: 0px;"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__item__text">
                                                <h6><a class="productName" onclick="redirectToProductDetails(<?php echo $key[0] ?>);" ><?php echo $key[2] ?></a></h6>
                                                <h5>$<?php echo $key[3] ?></h5>
                                            </div>
                                        </div>
                                    </div>
    
                            <?php
                                    $productCount++;
                                }
                            } catch (PDOException $e) {
                                echo "<script>console.log('product fetch error');</script>";
                            }
                    }

                    


                    ?>


                        </div><!-- row ends -->

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="filter__found">
                        <h6><span><?php echo $productCount; ?></span> Products found</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div id="animation">
                <div class="modal-header">
                    <span class="close">&times;</span>

                </div>
                <div class="modal-body">
                    <H4>The following orders have been approved:</H4>

                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">

                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-primary" style="padding: 10px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Purchased Qty</th>
                                                <th>Ind. Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div><!-- table responsive -->
                            </div><!-- demo box -->
                        </div><!-- col md -->
                    </div><!-- row -->
                    <br><br>

                    <h3 style="text-align:center; color: red; margin-bottom:15px;"> Thank You <h3>

                </div>

            </div><!-- animation -->
        </div>

    </div> <!-- mymodal ends -->


    <!-- Footer Section Begin -->
    <?php include('footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        var is_loggedIn = "<?php echo $is_loggedIn ?>";
        var user_id = "<?php echo $user_id ?>";
    </script>
    <script src="../Controllers/promptLogin.js"></script>
    <script src="../Controllers/categorySelector.js"></script>
    


</body>

</html>