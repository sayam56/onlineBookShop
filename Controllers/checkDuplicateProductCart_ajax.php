<?php

 include('../Model/connect.php');


     if(isset($_GET['productID']) ){
          $productID=$_GET['productID'];  
          $user_id=$_GET['user_id'];                  

          try{
            $cartValSQL= "SELECT * FROM `cart` WHERE user_id='".$user_id."' and product_id= '".$productID."'";
            $cartValObj=$conn->query($cartValSQL);
            $cartValCount=$cartValObj->rowCount();   
            
            if($cartValCount>0){
                echo "Exist";
            }
            else{
                echo "Continue";
            }
               
               echo "<script>console.log('INSERT SUCCESSFULL!!!!');</script>";
          }
          catch(PDOException $ex1){
               echo $ex1;
               
          }
     }

?>