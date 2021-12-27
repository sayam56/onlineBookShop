<?php
session_start();

include('../Model/connect.php');

$productCount=0;

//o by default means not logged in, 1 means logged in
$is_loggedIn=0; 
$username='';
$user_id='';
$cartCount=0;
$notiCount=0;

if ((isset($_SESSION['user_id'])) ) {
    $user_id=$_SESSION['user_id'];
}


//check for notifications



include('../Controllers/cartUpdater.php');


?>

<!DOCTYPE html>
<html lang="zxx">

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
    <section class="breadcrumb-section " style="background-image: url('../Assets/img/breadcrumb.png'); background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //getting the categories

                            try{
                                $cartsql = "SELECT * FROM `cart` WHERE user_id='".$user_id."' ";
                                $cartObj = $conn->query($cartsql);
                                $catrTab = $cartObj->fetchAll();
                                foreach ($catrTab as $key) {
                                   //key[2] contains the product id
                                   try{
                                    //get product info with the product ID
                                    $productsql = "SELECT * FROM `product` WHERE id='".$key[2]."' ";
                                    $productObj = $conn->query($productsql);
                                    $productTab = $productObj->fetchAll();

                                    foreach ($productTab as $productInfo) {
                                        ?>
                                        <tr id="cartRow<?php echo $key[2]; ?>">
                                            <td class="shoping__cart__item shopping_cart_img">
                                                <img src="<?php echo $productInfo[5]; ?>" alt="">
                                                <h5><?php echo $productInfo[2]; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                $<?php echo $productInfo[3]; ?>
                                            </td>
                                            <td class="shoping__cart__price" id="availableQTY<?php echo $key[2]; ?>">
                                            <!-- available quantity -->
                                            <?php echo $productInfo[4]; ?>pcs
                                            </td>
                                            <td class="shoping__cart__quantity">
                                            <!-- purchasing  quantity -->
                                                <div class="quantity">
                                                    <input class="qtyInput" id="qtyInput<?php echo $key[2]; ?>" type="number" value="<?php echo $key[3]; ?>" min="0" max="<?php echo $productInfo[4]; ?>">                                                  
                                                </div>
                                                <button id="qtyBTN<?php echo $key[2]; ?>" class="qtyBTN" onclick="updateTotal(<?php echo $key[2]; ?>,<?php echo $productInfo[3]; ?>, <?php echo $key[4]; ?>, <?php echo $productInfo[4]; ?>)">Update</button>
                                            </td>
                                            <td class="shoping__cart__total" id="qtyWiseTotal<?php echo $key[2]; ?>">
                                            $<?php echo $key[4]; ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close" onclick="deleteCartItem(<?php echo $key[2]; ?>, <?php echo $productInfo[4]; ?>);"></span>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                   }catch(PDOException $e2){
                                       echo "<script> console.log('<?php echo $e2; ?>'); </script>";
                                   }
                                }
                            }
                            catch(PDOException $e){
                                echo "<script>console.log('category fetch error');</script>";
                            }
                            
                            
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a class="primary-btn cart-btn cart-btn-right" onclick="updateCartPage()">Update Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul id="CartTotal">
                            <li>Total <span >$0</span></li>
                        </ul>
                        <a style="cursor: pointer;" onclick="confirmOrder();" class="primary-btn">Confirm Order</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

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
        var user_id = "<?php echo $user_id; ?>"
    </script>
    <script src="../Controllers/cartController.js"></script>

</body>

</html>