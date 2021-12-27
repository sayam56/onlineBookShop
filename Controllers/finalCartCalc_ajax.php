<?php
 //echo "console.log('next page SUCCESSFULL!!!!');";

 $sum=0;

 include('../Model/connect.php');


     if(isset($_GET['user_id']) ){
               
          $user_id= $_GET['user_id'];

          try{
               $sql= "SELECT total_price FROM `cart` WHERE user_id='".$user_id."'";
               $object=$conn->query($sql);
               $total_priceTable= $object->fetchAll();
               foreach ($total_priceTable as $key) {
                    $sum+=$key[0];
               }
               ?>
               <li>Total <span >$<?php echo $sum; ?></span></li>
               
               <?php
               
               echo "<script>console.log('Update SUCCESSFULL!!!!');</script>";
          }
          catch(PDOException $ex1){
               echo $ex1;
               
          }
     }

?>