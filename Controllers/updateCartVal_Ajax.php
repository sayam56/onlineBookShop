<?php
 //echo "console.log('next page SUCCESSFULL!!!!');";

 include('../Model/connect.php');



     if(isset($_GET['productID']) ){
          $productID=$_GET['productID'];  
          $updatedTotalPrice=$_GET['updatedTotalPrice']; 
          $updatedAvailableQty=$_GET['updatedAvailableQty'];  
          $purchasedQtyVal=$_GET['purchasedQtyVal'];     
          $user_id= $_GET['user_id'];

          try{
               $up_sql = "UPDATE cart SET product_qty='$purchasedQtyVal', total_price='$updatedTotalPrice' WHERE user_id='$user_id' AND product_id='$productID' "  ;
               $up_obj = $conn->prepare($up_sql)->execute();

               $up_sqlPrd = "UPDATE product SET qty='$updatedAvailableQty' WHERE id='$productID' "  ;
               $up_objPrd = $conn->prepare($up_sqlPrd)->execute();
          
               
               echo "<script>console.log('Update SUCCESSFULL!!!!');</script>";
          }
          catch(PDOException $ex1){
               echo $ex1;
               
          }
     }

?>